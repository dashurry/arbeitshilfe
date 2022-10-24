<?php



/**

 * Class Job.

 *

 * @category 

 *

 * @package 

 * @author  

 * @license 

 * @link    

 */



namespace App;



use Illuminate\Database\Eloquent\Model;

use File;

use Storage;

use DB;

use Auth;

use App\Proposal;

use App\Location;

use App\Language;

use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;
use Exception;

/**

 * Class Job

 *

 */

class Job extends Model

{

     /**

     * Protected Date

     *

     * @access protected

     * @var    array $dates

     */

    protected $dates = [

        'expiry_date',

        'created_at',

        'updated_at',

    ];

    /**

     * Get all of the categories for the job.

     *

     * @return relation

     */

    public function categories()

    {

        return $this->morphToMany('App\Category', 'catable');

    }



    /**

     * Get all of the languages for the user.

     *

     * @return relation

     */

    public function languages()

    {

        return $this->morphToMany('App\Language', 'langable');

    }



    /**

     * The skills that belong to the job.

     *

     * @return relation

     */

    public function skills()

    {

        return $this->belongsToMany('App\Skill');

    }



    /**

     * Get the location that owns the job.

     *

     * @return relation

     */

    public function location()

    {

        return $this->belongsTo('App\Location');

    }



    /**

     * Get the employer that owns the job.

     *

     * @return relation

     */

    public function employer()

    {

        return $this->belongsTo('App\User', 'user_id');

    }



    /**

     * Get the proposals associated with job.

     *

     * @return relation

     */

    public function proposals()

    {

        return $this->hasMany('App\Proposal');

    }



    /**

     * Get all of the job's reports.

     *

     * @return relation

     */

    public function reports()

    {

        return $this->morphMany('App\Report', 'reportable');

    }



    /**

     * Uppload Attcahments.

     *

     * @param mixed $uploadedFile uploaded file

     *

     * @return relation

     */

    public function uploadTempattachments($uploadedFile, $path)

    {

        $filename = $uploadedFile->getClientOriginalName();

        if (!file_exists($path)) {

            File::makeDirectory($path, 0755, true, true);

        }

        Storage::disk('local')->putFileAs(

            $path,

            $uploadedFile,

            $filename

        );

        return 'success';

    }



    /**

     * Set slug before saving in DB

     *

     * @param string $value value

     *

     * @access public

     *

     * @return string

     */

    public function setSlugAttribute($value)

    {

        if (!empty($value)) {

            $temp = str_slug($value, '-');

            if (!Job::all()->where('slug', $temp)->isEmpty()) {

                $i = 1;

                $new_slug = $temp . '-' . $i;

                while (!Job::all()->where('slug', $new_slug)->isEmpty()) {

                    $i++;

                    $new_slug = $temp . '-' . $i;

                }

                $temp = $new_slug;

            }

            $this->attributes['slug'] = $temp;

        }

    }



    /**

     * Store Jobs.

     *

     * @param mixed $request request->attr

     *

     * @return relation

     */

    public function storeJobs($request)

    {

        $json = array();

        if (!empty($request)) {

            $random_number = Helper::generateRandomCode(8);

            $code = strtoupper($random_number);

            $user_id = Auth::user()->id;

            $location = $request['locations'];

            $this->location()->associate($location);

            $this->employer()->associate($user_id);

            $this->title = filter_var($request['title'], FILTER_SANITIZE_STRING);

            $this->slug = filter_var($request['title'], FILTER_SANITIZE_STRING);

            $this->price = $request["project_cost"]>0? filter_var($request['project_cost'], FILTER_SANITIZE_STRING): null;

            $this->project_level = filter_var($request['project_levels'], FILTER_SANITIZE_STRING);

            $this->description = $request['description'];

            $this->english_level = filter_var($request['english_level'], FILTER_SANITIZE_STRING);

            $this->duration = filter_var($request['job_duration'], FILTER_SANITIZE_STRING);

            $this->freelancer_type = filter_var($request['freelancer_type'], FILTER_SANITIZE_STRING);

            $this->is_featured = filter_var($request['is_featured'], FILTER_SANITIZE_STRING);

            $this->show_attachments = filter_var($request['show_attachments'], FILTER_SANITIZE_STRING);

            $this->address = filter_var($request['address'], FILTER_SANITIZE_STRING);

            $this->longitude = filter_var($request['longitude'], FILTER_SANITIZE_STRING);

            $this->latitude = filter_var($request['latitude'], FILTER_SANITIZE_STRING);

            if (Schema::hasColumn('jobs', 'expiry_date')) {

                $this->expiry_date = $request['expiry_date'];

            }

            $old_path = 'uploads\jobs\temp';

            $job_attachments = array();

            if (!empty($request['attachments'])) {

                $attachments = $request['attachments'];

                foreach ($attachments as $key => $attachment) {

                    if (Storage::disk('local')->exists($old_path . '/' . $attachment)) {

                        $new_path = 'uploads/jobs/' . $user_id;

                        if (!file_exists($new_path)) {

                            File::makeDirectory($new_path, 0755, true, true);

                        }

                        $filename = time() . '-' . $attachment;

                        Storage::move($old_path . '/' . $attachment, $new_path . '/' . $filename);

                        $job_attachments[] = $filename;

                    }

                }

                $this->attachments = serialize($job_attachments);

            }

            $this->code = $code;

            $this->save();

            $job_id = $this->id;

            $skills = $request['skills'];

            $this->skills()->detach();

            if (!empty($skills)) {

                foreach ($skills as $skill) {

                    $this->skills()->attach($skill['id']);

                }

            }

            $job = Job::find($job_id);

            $languages = $request['languages'];

            $job->languages()->sync($languages);

            $categories = $request['categories'];

            $job->categories()->sync($categories);

            $json['type'] = 'success';

            return $json;

        } else {

            $json['type'] = 'error';

            return $json;

        }

    }



    /**

     * Update Jobs.

     *

     * @param mixed   $request request

     * @param integer $id      ID

     *

     * @return $request, ID

     */

    public function updateJobs($request, $id)

    {

        $json = array();

        if (!empty($request)) {

            $job = self::find($id);

            $random_number = Helper::generateRandomCode(8);

            $user_id = $job->user_id;

            $location = $request['locations'];

            $job->location()->associate($location);

            $job->employer()->associate($user_id);

            if ($job->title != $request['title']) {

                $job->slug = filter_var($request['title'], FILTER_SANITIZE_STRING);

            }

            $job->title = filter_var($request['title'], FILTER_SANITIZE_STRING);

            $job->price = filter_var($request['project_cost'], FILTER_SANITIZE_STRING);

            $job->project_level = filter_var($request['project_levels'], FILTER_SANITIZE_STRING);

            $job->description = $request['description'];

            $job->english_level = filter_var($request['english_level'], FILTER_SANITIZE_STRING);

            $job->duration = filter_var($request['job_duration'], FILTER_SANITIZE_STRING);

            $job->freelancer_type = filter_var($request['freelancer_type'], FILTER_SANITIZE_STRING);

            $job->is_featured = filter_var($request['is_featured'], FILTER_SANITIZE_STRING);

            $job->show_attachments = filter_var($request['show_attachments'], FILTER_SANITIZE_STRING);

            $job->address = filter_var($request['address'], FILTER_SANITIZE_STRING);

            $job->longitude = filter_var($request['longitude'], FILTER_SANITIZE_STRING);

            $job->latitude = filter_var($request['latitude'], FILTER_SANITIZE_STRING);

            if (Schema::hasColumn('jobs', 'expiry_date')) {

                $job->expiry_date = $request['expiry_date'];

            }

            $old_path = 'uploads\jobs\temp';

            $job_attachments = array();

            if (!empty($request['attachments'])) {

                $attachments = $request['attachments'];

                foreach ($attachments as $key => $attachment) {

                    $filename = $attachment;

                    if (Storage::disk('local')->exists($old_path . '/' . $attachment)) {

                        $new_path = 'uploads/jobs/' . $user_id;

                        if (!file_exists($new_path)) {

                            File::makeDirectory($new_path, 0755, true, true);

                        }

                        $filename = time() . '-' . $attachment;

                        Storage::move($old_path . '/' . $attachment, $new_path . '/' . $filename);

                    }

                    $job_attachments[] = $filename;

                }

                $job->attachments = serialize($job_attachments);

            } else {

                $job->attachments = null;

            }

            if (empty($job->code)) {

                $code = strtoupper($random_number);

                $job->code = $code;

            }

            $job->save();

            $job_id = $job->id;

            $skills = $request['skills'];

            $job->skills()->detach();

            if (!empty($skills)) {

                foreach ($skills as $skill) {

                    $job->skills()->attach($skill['id']);

                }

            }

            $job = Job::find($job_id);

            $languages = $request['languages'];

            $job->languages()->sync($languages);

            $categories = $request['categories'];

            $job->categories()->sync($categories);

            $json['type'] = 'success';

            return $json;

        } else {

            $json['type'] = 'error';

            return $json;

        }

    }



    /**

     * Get all of the categories for the job.

     *

     * @param string $keyword                keyword

     * @param string $search_categories      search_categories

     * @param string $search_locations       search_locations

     * @param string $search_skills          search_skills

     * @param string $search_project_lengths search_project_lengths

     * @param string $search_languages       search_languages

     *

     * @return relation

     */

    // public static function getSearchResult(

    //     $address,

    //     $keyword,

    //     $search_categories,

    //     $search_locations,

    //     $search_skills,

    //     $search_project_lengths,

    //     $search_languages,

    //     $display_completed_projects,

    //     $min_price,

    //     $max_price,

    //     $search_datePosted

    // ) 
    // {

    //     $json = array();

    //     $jobs = Job::select('*');

    //     $job_id = array();

    //     $filters = array();

    //     $filters['type'] = 'job';

    //     if (!empty($keyword)) {

    //         $filters['s'] = $keyword;

    //         $jobs->where('title', 'like', "%$keyword%");

    //     };

    //     if (!empty($address)) {

    //         $filters['addr'] = $address;

    //         $jobs->where('address', 'like', '%' . $address . '%');

    //     };



    //     if (!empty($search_categories)) {

    //         try{
    //             $search_categories = json_decode($search_categories, true);

    //             $filters['category'] = $search_categories;

    //             foreach ($search_categories as $key => $search_category) {

    //                 $categor_obj = Category::where('slug', $search_category["slug"])->first();

    //                 $category = !empty($categor_obj) && !empty($categor_obj->id) ? Category::find($categor_obj->id) : '';

    //                 if (!empty($category) && !empty($category->jobs)) {

    //                     $category_jobs = $category->jobs->pluck('id')->toArray();

    //                     foreach ($category_jobs as $id) {

    //                         $job_id[] = $id;
    //                     }
    //                 }
    //             }
    //         }
    //         catch(Exception $e){
    //             $category = Category::find($search_categories);

    //             $category_jobs = $category->jobs->pluck('id')->toArray();
    //             foreach ($category_jobs as $id) {
    //                 $job_id[] = $id;
    //             }
    //         }

    //         $jobs->whereIn('id', $job_id);

    //     }

    //     if (!empty($search_locations)) {

    //         $search_locations = json_decode($search_locations,true);
    //         $locations = array();

    //         $filters['locations'] = $search_locations;
    //         $slugs = array();

    //         foreach($search_locations as $slug)
    //         {
    //             array_push($slugs,$slug["slug"]);
    //         }

    //         if (is_array($search_locations)) {

    //             $locations = Location::select('id')->whereIn('slug', $slugs)->get()->pluck('id')->toArray();

    //         } else {

    //             $locations = Location::select('id')->where('slug', $search_locations)->get()->pluck('id')->toArray();

    //         }

    //         $jobs->whereIn('location_id', $locations);

    //     }

    //     if (!empty($search_skills)) {
    //         $search_skills = json_decode($search_skills,true);

    //         $filters['skills'] = $search_skills;

    //         foreach ($search_skills as $key => $search_skill) {

    //             $skill_obj = Skill::where('slug', $search_skill)->first();

    //             $skill = Skill::find($skill_obj->id);

    //             if (!empty($skill->jobs)) {

    //                 $skill_jobs = $skill->jobs->pluck('id')->toArray();

    //                 foreach ($skill_jobs as $id) {

    //                     $job_id[] = $id;

    //                 }

    //             }

    //         }

    //         $jobs->whereIn('id', $job_id);

    //     }

    //     if (!empty($search_project_lengths)) {

    //         $search_project_lengths = json_decode($search_project_lengths,true);

    //         $filters['project_lengths'] = $search_project_lengths;

    //         $jobs->whereIn('duration', $search_project_lengths);

    //     }

    //     if (!empty($search_languages)) {

    //         $filters['languages'] = $search_languages;

    //         $languages = Language::whereIn('slug', $search_languages)->get();

    //         foreach ($languages as $key => $language) {

    //             if (!empty($language->jobs[$key]->id)) {

    //                 $job_id[] = $language->jobs[$key]->id;

    //             }

    //         }

    //         $jobs->whereIn('id', $job_id);

    //     }

    //     if (!empty($max_price)) {

    //         $jobs->whereBetween('price', [$min_price, $max_price]);

    //     }

    //     if ($display_completed_projects == 'false') {

    //         $jobs = $jobs->where('status', '!=', 'completed');

    //     }

    //     if (Schema::hasColumn('jobs', 'expiry_date')) {

    //         $jobs = $jobs->WhereNull('expiry_date')->orWhereDate('expiry_date', '>', date('Y-m-d'));

    //     }

    //     if(!empty($search_datePosted)){
    //         if($search_datePosted == "hour"){
    //             $jobs->whereRaw('jobs.created_at = DATE_SUB(NOW(), INTERVAL 1 HOUR)');
    //         }
    //         else{
    //             $timeFrom = Carbon::now();
    //             $timeTo = Carbon::now()->subDays($search_datePosted);
    //             $jobs->whereDate("created_at", "<=", $timeFrom)->whereDate("created_at", ">=", $timeTo);
    //         }
    //     }


    //     $jobs = $jobs->orderByRaw("is_featured DESC, updated_at DESC")->with(["employer","location"])->paginate(10)->setPath('');

    //     foreach($jobs as $job)
    //     {
    //         $desc = strip_tags(stripslashes($job->description));
    //         $job->description = str_limit(html_entity_decode($desc), 200,"...");
    //         $job->duration = Helper::getJobDurationList($job->duration);


    //         // Find Category
    //         $catId = DB::table('catables')->where("catable_id",$job->id)->get();

    //         $categoryNames = array();

    //         foreach($catId as $catable)
    //         {
    //             array_push($categoryNames,["name"=>Category::find($catable->category_id)->title]);
    //         }

    //         $job["categories"] = $categoryNames;
    //     }

    //     foreach ($filters as $key => $filter) {

    //         $pagination = $jobs->appends(

    //             array(

    //                 $key => $filter

    //             )

    //         );

    //     }




    //     $json['jobs'] = $jobs;

    //     return $json;

    // }



    public static function getSearchResult(

        $address,

        $keyword,

        $search_categories,

        $search_locations,

        $search_skills,

        $search_project_lengths,

        $search_languages,

        $display_completed_projects,

        $min_price,

        $max_price,

        $search_datePosted

    ) {

        $json = array();

        $jobs = Job::select("*")->whereNull('expiry_date')->orWhereDate('expiry_date', '>', Carbon::now());

        $job_id = array();

        $filters = array();

        $filters['type'] = 'job';

        if ($display_completed_projects == 'false') {

            $jobs = $jobs->where('status', '!=', 'completed');
        }

        // Keyword
        if (!empty($keyword)) {
            $jobs->where("title", "like", "%$keyword%")->get();
        }

        // address
        if (!empty($address)) {
            $jobs->where('address', 'like', '%' . $address . '%');
        }

        // Category
        try {
            $search_categories = json_decode($search_categories, true);

            if (array_filter($search_categories) != []) {
                $catIds = [];
                foreach ($search_categories as $srchCat) {
                    $catIds[] = $srchCat["id"];
                }
                $filteredJobIds = DB::table("catables")->whereIn("category_id", $catIds)->pluck("catable_id")->toArray();
                $jobs->whereIn("id", $filteredJobIds);

            }
        } catch (Exception $e) {
            if (!empty($search_categories)) {
                $filteredJobIds = DB::table("catables")->where("category_id", $search_categories)->pluck("catable_id")->toArray();
                $jobs->whereIn("id", $filteredJobIds);
                
            }
        }


        // Locations
        try {

            $search_locations = json_decode($search_locations, true);

            if (array_filter($search_locations) != []) {

                $location_ids = [];

                foreach ($search_locations as $srchLoc) {

                    $location_ids[] = $srchLoc["id"];
                }

                $jobs->whereIn("location_id", $location_ids);
            }
        } catch (Exception $e) {

            if (!empty($search_locations)) {

                $jobs->where("location_id", $search_locations);
            }
        }

        // Project Ranges
        try {

            $search_project_lengths = json_decode($search_project_lengths, true);

            if (array_filter($search_project_lengths) != []) {

                $jobs->whereIn('duration', $search_project_lengths);
            }
        } catch (Exception $e) {

            if (!empty($search_project_lengths)) {

                $jobs->where('duration', $search_project_lengths);
            }
        }

        // Date posted
        if (!empty($search_datePosted)) {

            if ($search_datePosted == "hour") {

                $jobs->whereRaw('jobs.created_at >= DATE_SUB(NOW(), INTERVAL 1 HOUR)');
            } else {

                $timeFrom = Carbon::now();

                $timeTo = Carbon::now()->subDays($search_datePosted);

                $jobs->whereDate("created_at", "<=", $timeFrom)->whereDate("created_at", ">=", $timeTo);
            }
        }

        $jobs = $jobs->orderByRaw("is_featured DESC, updated_at DESC")->with(["employer", "location"])->paginate(2);

        foreach ($jobs as $job) {
            $desc = strip_tags(stripslashes($job->description));
            $job->description = str_limit(html_entity_decode($desc), 200, "...");
            $job->duration = Helper::getJobDurationList($job->duration);


            // Find Category
            $catId = DB::table('catables')->where("catable_id", $job->id)->get();

            $categoryNames = array();

            foreach ($catId as $catable) {
                array_push($categoryNames, ["name" => Category::find($catable->category_id)->title??""]);
            }

            $job["categories"] = $categoryNames;
        }




        $json['jobs'] = $jobs;

        return $json;
    }



    /**

     * Delete record from storage

     *

     * @param int $id id

     *

     * @return relation

     */

    public static function deleteRecord($id)

    {

        $job = self::find($id);

        if (!empty($job->proposals)) {

            foreach ($job->proposals as $key => $proposal) {

                $proposal = Proposal::find($proposal->id);

                $proposal->delete();

            }

        }

        $job->skills()->detach();

        $job->languages()->detach();

        $job->categories()->detach();

        return $job->delete();

    }



    /**

     * Get order

     *

     * @param int   $project_id project_id

     *

     * @return response

     */

    public static function getProjectOrder($project_id)

    {

        return DB::table('orders')

            ->join('proposals', 'orders.product_id', '=', 'proposals.id')

            ->join('jobs', 'proposals.job_id', '=', 'jobs.id')

            ->select('orders.product_id')

            ->where('orders.type', 'job')

            ->where('jobs.id', $project_id)

            ->first();

    }

}

