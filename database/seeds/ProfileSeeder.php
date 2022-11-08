<?php

/**

 * Class ProfileSeeder.

 *

 * @category Arbeitshilfe

 *

 * @package Arbeitshilfe

 * @author  Mauro Frappietro <hello@maurofrappietro.com>

 * @license https://maurofrappietro.com/ Arbeitshilfe

 * @link    https://maurofrappietro.com/

 */

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;



/**

 * Class ProfileSeeder

 */

class ProfileSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        DB::table('profiles')->insert(

            [

                //Admin

                [

                    'user_id' => '1',

                    'department_id' => null,

                    'no_of_employees' => null,

                    'freelancer_type' => null,

                    'english_level' => null,

                    'hourly_rate' => null,

                    'experience' => null,

                    'education' => null,

                    'projects' => null,

                    'awards' => null,

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => null,

                    'longitude' => null,

                    'latitude' => null,

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => null,

                    'tagline' => null,

                    'description' => null,

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                //Employers

                [

                    'user_id' => '2',

                    'department_id' => 1,

                    'no_of_employees' => 1,

                    'freelancer_type' => 'agency',

                    'english_level' => 'fluent',

                    'hourly_rate' => null,

                    'experience' => null,

                    'education' => null,

                    'projects' => null,

                    'awards' => null,

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Larapinta Dr Alice Springs NT 0870 Australia',

                    'longitude' => '133.368101',

                    'latitude' => '-24.004758',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => null,

                    'tagline' => 'Excepteur sint occaecat cupidatat non proident',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '3',

                    'department_id' => 2,

                    'no_of_employees' => 10,

                    'freelancer_type' => 'independent',

                    'english_level' => 'conversational',

                    'hourly_rate' => null,

                    'experience' => null,

                    'education' => null,

                    'projects' => null,

                    'awards' => null,

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => '23 Multa Rd Haasts Bluff NT 0872 Australia',

                    'longitude' => '131.881749629974',

                    'latitude' => '23.4475749078235',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => null,

                    'tagline' => 'Excepteur sint occaecat cupidatat non proident',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '4',

                    'department_id' => 3,

                    'no_of_employees' => 100,

                    'freelancer_type' => 'rising_talent',

                    'english_level' => 'native',

                    'hourly_rate' => null,

                    'experience' => null,

                    'education' => null,

                    'projects' => null,

                    'awards' => null,

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Lot 39 Anmatjere NT 0872 Australia',

                    'longitude' => '132.609851360321',

                    'latitude' => '-21.2475322804021',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => null,

                    'tagline' => 'Excepteur sint occaecat cupidatat non proident',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '5',

                    'department_id' => 4,

                    'no_of_employees' => 500,

                    'freelancer_type' => 'independent',

                    'english_level' => 'professional',

                    'hourly_rate' => null,

                    'experience' => null,

                    'education' => null,

                    'projects' => null,

                    'awards' => null,

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'AB-58 John D\'Or Prairie, AB Canada',

                    'longitude' => '-115.151181221008',

                    'latitude' => '58.4925724410151',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => null,

                    'tagline' => 'Excepteur sint occaecat cupidatat non proident',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '6',

                    'department_id' => 5,

                    'no_of_employees' => 1000,

                    'freelancer_type' => 'independent',

                    'english_level' => 'conversational',

                    'hourly_rate' => null,

                    'experience' => null,

                    'education' => null,

                    'projects' => null,

                    'awards' => null,

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => '10009 99 St High Level, AB T0H 1Z0 Canada',

                    'longitude' => '-117.131303250789',

                    'latitude' => '58.5168370527763',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => null,

                    'tagline' => 'Excepteur sint occaecat cupidatat non proident',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '7',

                    'department_id' => 6,

                    'no_of_employees' => 5000,

                    'freelancer_type' => 'agency',

                    'english_level' => 'fluent',

                    'hourly_rate' => null,

                    'experience' => null,

                    'education' => null,

                    'projects' => null,

                    'awards' => null,

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => '9809 100 St High Level, AB T0H 1Z0 Canada',

                    'longitude' => '-117.130516022443',

                    'latitude' => '58.5191843284108',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => null,

                    'tagline' => 'Excepteur sint occaecat cupidatat non proident',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '8',

                    'department_id' => 7,

                    'no_of_employees' => 1,

                    'freelancer_type' => 'rising_talent',

                    'english_level' => 'native',

                    'hourly_rate' => null,

                    'experience' => null,

                    'education' => null,

                    'projects' => null,

                    'awards' => null,

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Unit 3, Paynes Lane Ind. Est 11 Paynes Ln Rugby CV21 2UH UK',

                    'longitude' => '-1.28647327423095',

                    'latitude' => '52.3749008022389',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => null,

                    'tagline' => 'Excepteur sint occaecat cupidatat non proident',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '9',

                    'department_id' => 8,

                    'no_of_employees' => 10,

                    'freelancer_type' => 'agency',

                    'english_level' => 'conversational',

                    'hourly_rate' => null,

                    'experience' => null,

                    'education' => null,

                    'projects' => null,

                    'awards' => null,

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => '12 Paynes Ln Rugby CV21 2UH UK',

                    'longitude' => '-1.28587514162063',

                    'latitude' => '52.3748533156522',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => null,

                    'tagline' => 'Excepteur sint occaecat cupidatat non proident',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '10',

                    'department_id' => 9,

                    'no_of_employees' => 100,

                    'freelancer_type' => 'independent',

                    'english_level' => 'native',

                    'hourly_rate' => null,

                    'experience' => null,

                    'education' => null,

                    'projects' => null,

                    'awards' => null,

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => '31 Bridget St Rugby CV21 2BH UK',

                    'longitude' => '-1.27051681280136',

                    'latitude' => '52.3737889477259',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => null,

                    'tagline' => 'Excepteur sint occaecat cupidatat non proident',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '11',

                    'department_id' => 1,

                    'no_of_employees' => 500,

                    'freelancer_type' => 'independent',

                    'english_level' => 'fluent',

                    'hourly_rate' => null,

                    'experience' => null,

                    'education' => null,

                    'projects' => null,

                    'awards' => null,

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Gate Chaurai, Madhya Pradesh 480115 India',

                    'longitude' => '79.2477750778198',

                    'latitude' => '22.0512229130773',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => null,

                    'tagline' => 'Excepteur sint occaecat cupidatat non proident',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '12',

                    'department_id' => 2,

                    'no_of_employees' => 1000,

                    'freelancer_type' => 'independent',

                    'english_level' => 'basic',

                    'hourly_rate' => null,

                    'experience' => null,

                    'education' => null,

                    'projects' => null,

                    'awards' => null,

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Barkhudar Bava Badasab Bava. Dargah Mahelaj, Gujarat 387530 India',

                    'longitude' => '72.5970500707626',

                    'latitude' => '22.681497230492',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => null,

                    'tagline' => 'Excepteur sint occaecat cupidatat non proident',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                //Freelancers

                [

                    'user_id' => '13',

                    'department_id' => null,

                    'no_of_employees' => null,

                    'freelancer_type' => 'agency',

                    'english_level' => 'conversational',

                    'hourly_rate' => '25',

                    'experience' => 'a:2:{i:0;a:5:{s:9:"job_title";s:21:"SEO Expert Consultant";s:10:"start_date";s:10:"2019-04-18";s:8:"end_date";s:10:"2019-04-20";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}i:1;a:5:{s:9:"job_title";s:13:"Start & Sound";s:10:"start_date";s:10:"2019-04-26";s:8:"end_date";s:10:"2019-04-28";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'education' => 'a:1:{i:0;a:5:{s:12:"degree_title";s:22:"Information Technology";s:10:"start_date";s:10:"2019-04-09";s:8:"end_date";s:10:"2019-04-17";s:15:"institute_title";s:35:"Arbeitshilfe Institute of Technology";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'awards' => 'a:4:{i:0;a:3:{s:11:"award_title";s:10:"Best Theme";s:10:"award_date";s:8:"12-12-31";s:18:"award_hidden_image";s:22:"15543822240-img-03.jpg";}i:1;a:3:{s:11:"award_title";s:23:"Monster Developer Award";s:10:"award_date";s:8:"12-01-14";s:18:"award_hidden_image";s:22:"15544736871-img-09.jpg";}i:2;a:3:{s:11:"award_title";s:23:"Best Communication 2015";s:10:"award_date";s:8:"19-02-01";s:18:"award_hidden_image";s:22:"15544736872-img-10.jpg";}i:3;a:3:{s:11:"award_title";s:23:"Best Logo Design Winner";s:10:"award_date";s:8:"20-10-09";s:18:"award_hidden_image";s:22:"15544736873-img-12.jpg";}}',

                    'projects' => 'a:6:{i:0;a:3:{s:13:"project_title";s:8:"Arbeitshilfe";s:11:"project_url";s:39:"http://www.arbeitshilfe.website/projects/arbeitshilfe";s:20:"project_hidden_image";s:26:"15543822240-banner-img.jpg";}i:1;a:3:{s:13:"project_title";s:9:"Videohive";s:11:"project_url";s:17:"www.videohive.net";s:20:"project_hidden_image";s:10:"img-01.jpg";}i:2;a:3:{s:13:"project_title";s:10:"Codecanyon";s:11:"project_url";s:18:"www.codecanyon.net";s:20:"project_hidden_image";s:10:"img-03.jpg";}i:3;a:3:{s:13:"project_title";s:12:"Graphicriver";s:11:"project_url";s:20:"www.graphicriver.net";s:20:"project_hidden_image";s:10:"img-04.jpg";}i:4;a:3:{s:13:"project_title";s:9:"Photodune";s:11:"project_url";s:17:"www.photodune.net";s:20:"project_hidden_image";s:10:"img-05.jpg";}i:5;a:3:{s:13:"project_title";s:11:"Audiojungle";s:11:"project_url";s:19:"www.audiojungle.net";s:20:"project_hidden_image";s:10:"img-06.jpg";}}',

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Mahakali Temple Mahelaj, Gujarat 387530 India',

                    'longitude' => '72.6193284988403',

                    'latitude' => '22.69013144544',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => 'female',

                    'tagline' => 'Pioneers Of ECommerce Data Entry',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '14',

                    'department_id' => null,

                    'no_of_employees' => null,

                    'freelancer_type' => 'rising_talent',

                    'english_level' => 'basic',

                    'hourly_rate' => '12',

                    'experience' => 'a:2:{i:0;a:5:{s:9:"job_title";s:21:"SEO Expert Consultant";s:10:"start_date";s:10:"2019-04-18";s:8:"end_date";s:10:"2019-04-20";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}i:1;a:5:{s:9:"job_title";s:13:"Start & Sound";s:10:"start_date";s:10:"2019-04-26";s:8:"end_date";s:10:"2019-04-28";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'education' => 'a:1:{i:0;a:5:{s:12:"degree_title";s:22:"Information Technology";s:10:"start_date";s:10:"2019-04-09";s:8:"end_date";s:10:"2019-04-17";s:15:"institute_title";s:35:"Arbeitshilfe Institute of Technology";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'awards' => 'a:4:{i:0;a:3:{s:11:"award_title";s:10:"Best Theme";s:10:"award_date";s:8:"12-12-31";s:18:"award_hidden_image";s:22:"15543822240-img-03.jpg";}i:1;a:3:{s:11:"award_title";s:23:"Monster Developer Award";s:10:"award_date";s:8:"12-01-14";s:18:"award_hidden_image";s:22:"15544736871-img-09.jpg";}i:2;a:3:{s:11:"award_title";s:23:"Best Communication 2015";s:10:"award_date";s:8:"19-02-01";s:18:"award_hidden_image";s:22:"15544736872-img-10.jpg";}i:3;a:3:{s:11:"award_title";s:23:"Best Logo Design Winner";s:10:"award_date";s:8:"20-10-09";s:18:"award_hidden_image";s:22:"15544736873-img-12.jpg";}}',

                    'projects' => 'a:6:{i:0;a:3:{s:13:"project_title";s:8:"Arbeitshilfe";s:11:"project_url";s:39:"http://www.arbeitshilfe.website/projects/arbeitshilfe";s:20:"project_hidden_image";s:26:"15543822240-banner-img.jpg";}i:1;a:3:{s:13:"project_title";s:9:"Videohive";s:11:"project_url";s:17:"www.videohive.net";s:20:"project_hidden_image";s:10:"img-01.jpg";}i:2;a:3:{s:13:"project_title";s:10:"Codecanyon";s:11:"project_url";s:18:"www.codecanyon.net";s:20:"project_hidden_image";s:10:"img-03.jpg";}i:3;a:3:{s:13:"project_title";s:12:"Graphicriver";s:11:"project_url";s:20:"www.graphicriver.net";s:20:"project_hidden_image";s:10:"img-04.jpg";}i:4;a:3:{s:13:"project_title";s:9:"Photodune";s:11:"project_url";s:17:"www.photodune.net";s:20:"project_hidden_image";s:10:"img-05.jpg";}i:5;a:3:{s:13:"project_title";s:11:"Audiojungle";s:11:"project_url";s:19:"www.audiojungle.net";s:20:"project_hidden_image";s:10:"img-06.jpg";}}',

                    'saved_jobs' => 'a:1:{i:0;i:3;}',

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Yenidoğan Mahallesi İstanbul Cd. 71200 Kırıkkale Merkez/Kırıkkale Turkey',

                    'longitude' => '33.5064741969108',

                    'latitude' => '39.841945184348',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => 'male',

                    'tagline' => 'SEO Expert & Consultant',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '15',

                    'department_id' => null,

                    'no_of_employees' => null,

                    'freelancer_type' => 'independent',

                    'english_level' => 'conversational',

                    'hourly_rate' => '44',

                    'experience' => 'a:2:{i:0;a:5:{s:9:"job_title";s:21:"SEO Expert Consultant";s:10:"start_date";s:10:"2019-04-18";s:8:"end_date";s:10:"2019-04-20";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}i:1;a:5:{s:9:"job_title";s:13:"Start & Sound";s:10:"start_date";s:10:"2019-04-26";s:8:"end_date";s:10:"2019-04-28";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'education' => 'a:1:{i:0;a:5:{s:12:"degree_title";s:22:"Information Technology";s:10:"start_date";s:10:"2019-04-09";s:8:"end_date";s:10:"2019-04-17";s:15:"institute_title";s:35:"Arbeitshilfe Institute of Technology";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'awards' => 'a:4:{i:0;a:3:{s:11:"award_title";s:10:"Best Theme";s:10:"award_date";s:8:"12-12-31";s:18:"award_hidden_image";s:22:"15543822240-img-03.jpg";}i:1;a:3:{s:11:"award_title";s:23:"Monster Developer Award";s:10:"award_date";s:8:"12-01-14";s:18:"award_hidden_image";s:22:"15544736871-img-09.jpg";}i:2;a:3:{s:11:"award_title";s:23:"Best Communication 2015";s:10:"award_date";s:8:"19-02-01";s:18:"award_hidden_image";s:22:"15544736872-img-10.jpg";}i:3;a:3:{s:11:"award_title";s:23:"Best Logo Design Winner";s:10:"award_date";s:8:"20-10-09";s:18:"award_hidden_image";s:22:"15544736873-img-12.jpg";}}',

                    'projects' => 'a:6:{i:0;a:3:{s:13:"project_title";s:8:"Arbeitshilfe";s:11:"project_url";s:39:"http://www.arbeitshilfe.website/projects/arbeitshilfe";s:20:"project_hidden_image";s:26:"15543822240-banner-img.jpg";}i:1;a:3:{s:13:"project_title";s:9:"Videohive";s:11:"project_url";s:17:"www.videohive.net";s:20:"project_hidden_image";s:10:"img-01.jpg";}i:2;a:3:{s:13:"project_title";s:10:"Codecanyon";s:11:"project_url";s:18:"www.codecanyon.net";s:20:"project_hidden_image";s:10:"img-03.jpg";}i:3;a:3:{s:13:"project_title";s:12:"Graphicriver";s:11:"project_url";s:20:"www.graphicriver.net";s:20:"project_hidden_image";s:10:"img-04.jpg";}i:4;a:3:{s:13:"project_title";s:9:"Photodune";s:11:"project_url";s:17:"www.photodune.net";s:20:"project_hidden_image";s:10:"img-05.jpg";}i:5;a:3:{s:13:"project_title";s:11:"Audiojungle";s:11:"project_url";s:19:"www.audiojungle.net";s:20:"project_hidden_image";s:10:"img-06.jpg";}}',

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Yaylacık Mahallesi 373. Sk. No:2 71100 Kırıkkale Merkez/Kırıkkale Turkey',

                    'longitude' => '33.4971870481967',

                    'latitude' => '39.8404170632178',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => 'female',

                    'tagline' => 'Skilled Full Stack Web Developer',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '16',

                    'department_id' => null,

                    'no_of_employees' => null,

                    'freelancer_type' => 'agency',

                    'english_level' => 'basic',

                    'hourly_rate' => '98',

                    'experience' => 'a:2:{i:0;a:5:{s:9:"job_title";s:21:"SEO Expert Consultant";s:10:"start_date";s:10:"2019-04-18";s:8:"end_date";s:10:"2019-04-20";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}i:1;a:5:{s:9:"job_title";s:13:"Start & Sound";s:10:"start_date";s:10:"2019-04-26";s:8:"end_date";s:10:"2019-04-28";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'education' => 'a:1:{i:0;a:5:{s:12:"degree_title";s:22:"Information Technology";s:10:"start_date";s:10:"2019-04-09";s:8:"end_date";s:10:"2019-04-17";s:15:"institute_title";s:35:"Arbeitshilfe Institute of Technology";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'awards' => 'a:4:{i:0;a:3:{s:11:"award_title";s:10:"Best Theme";s:10:"award_date";s:8:"12-12-31";s:18:"award_hidden_image";s:22:"15543822240-img-03.jpg";}i:1;a:3:{s:11:"award_title";s:23:"Monster Developer Award";s:10:"award_date";s:8:"12-01-14";s:18:"award_hidden_image";s:22:"15544736871-img-09.jpg";}i:2;a:3:{s:11:"award_title";s:23:"Best Communication 2015";s:10:"award_date";s:8:"19-02-01";s:18:"award_hidden_image";s:22:"15544736872-img-10.jpg";}i:3;a:3:{s:11:"award_title";s:23:"Best Logo Design Winner";s:10:"award_date";s:8:"20-10-09";s:18:"award_hidden_image";s:22:"15544736873-img-12.jpg";}}',

                    'projects' => 'a:6:{i:0;a:3:{s:13:"project_title";s:8:"Arbeitshilfe";s:11:"project_url";s:39:"http://www.arbeitshilfe.website/projects/arbeitshilfe";s:20:"project_hidden_image";s:26:"15543822240-banner-img.jpg";}i:1;a:3:{s:13:"project_title";s:9:"Videohive";s:11:"project_url";s:17:"www.videohive.net";s:20:"project_hidden_image";s:10:"img-01.jpg";}i:2;a:3:{s:13:"project_title";s:10:"Codecanyon";s:11:"project_url";s:18:"www.codecanyon.net";s:20:"project_hidden_image";s:10:"img-03.jpg";}i:3;a:3:{s:13:"project_title";s:12:"Graphicriver";s:11:"project_url";s:20:"www.graphicriver.net";s:20:"project_hidden_image";s:10:"img-04.jpg";}i:4;a:3:{s:13:"project_title";s:9:"Photodune";s:11:"project_url";s:17:"www.photodune.net";s:20:"project_hidden_image";s:10:"img-05.jpg";}i:5;a:3:{s:13:"project_title";s:11:"Audiojungle";s:11:"project_url";s:19:"www.audiojungle.net";s:20:"project_hidden_image";s:10:"img-06.jpg";}}',

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Yaylacık Mahallesi 332. Sk. No:6 71100 Kırıkkale Merkez/Kırıkkale Turkey',

                    'longitude' => '33.4949138760566',

                    'latitude' => '39.8400257598855',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => 'male',

                    'tagline' => 'SEO/PPC Social Media Marketing Expert',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '17',

                    'department_id' => null,

                    'no_of_employees' => null,

                    'freelancer_type' => 'rising_talent',

                    'english_level' => 'conversational',

                    'hourly_rate' => '25',

                    'experience' => 'a:2:{i:0;a:5:{s:9:"job_title";s:21:"SEO Expert Consultant";s:10:"start_date";s:10:"2019-04-18";s:8:"end_date";s:10:"2019-04-20";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}i:1;a:5:{s:9:"job_title";s:13:"Start & Sound";s:10:"start_date";s:10:"2019-04-26";s:8:"end_date";s:10:"2019-04-28";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'education' => 'a:1:{i:0;a:5:{s:12:"degree_title";s:22:"Information Technology";s:10:"start_date";s:10:"2019-04-09";s:8:"end_date";s:10:"2019-04-17";s:15:"institute_title";s:35:"Arbeitshilfe Institute of Technology";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'awards' => 'a:4:{i:0;a:3:{s:11:"award_title";s:10:"Best Theme";s:10:"award_date";s:8:"12-12-31";s:18:"award_hidden_image";s:22:"15543822240-img-03.jpg";}i:1;a:3:{s:11:"award_title";s:23:"Monster Developer Award";s:10:"award_date";s:8:"12-01-14";s:18:"award_hidden_image";s:22:"15544736871-img-09.jpg";}i:2;a:3:{s:11:"award_title";s:23:"Best Communication 2015";s:10:"award_date";s:8:"19-02-01";s:18:"award_hidden_image";s:22:"15544736872-img-10.jpg";}i:3;a:3:{s:11:"award_title";s:23:"Best Logo Design Winner";s:10:"award_date";s:8:"20-10-09";s:18:"award_hidden_image";s:22:"15544736873-img-12.jpg";}}',

                    'projects' => 'a:6:{i:0;a:3:{s:13:"project_title";s:8:"Arbeitshilfe";s:11:"project_url";s:39:"http://www.arbeitshilfe.website/projects/arbeitshilfe";s:20:"project_hidden_image";s:26:"15543822240-banner-img.jpg";}i:1;a:3:{s:13:"project_title";s:9:"Videohive";s:11:"project_url";s:17:"www.videohive.net";s:20:"project_hidden_image";s:10:"img-01.jpg";}i:2;a:3:{s:13:"project_title";s:10:"Codecanyon";s:11:"project_url";s:18:"www.codecanyon.net";s:20:"project_hidden_image";s:10:"img-03.jpg";}i:3;a:3:{s:13:"project_title";s:12:"Graphicriver";s:11:"project_url";s:20:"www.graphicriver.net";s:20:"project_hidden_image";s:10:"img-04.jpg";}i:4;a:3:{s:13:"project_title";s:9:"Photodune";s:11:"project_url";s:17:"www.photodune.net";s:20:"project_hidden_image";s:10:"img-05.jpg";}i:5;a:3:{s:13:"project_title";s:11:"Audiojungle";s:11:"project_url";s:19:"www.audiojungle.net";s:20:"project_hidden_image";s:10:"img-06.jpg";}}',

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Baqala Al Kamal Abu Dhabi United Arab Emirates',

                    'longitude' => '53.6993788182735',

                    'latitude' => '23.6520498992703',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => 'male',

                    'tagline' => 'Classifieds Posting, Data Entry, Typing',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '18',

                    'department_id' => null,

                    'no_of_employees' => null,

                    'freelancer_type' => 'agency',

                    'english_level' => 'professional',

                    'hourly_rate' => '32',

                    'experience' => 'a:2:{i:0;a:5:{s:9:"job_title";s:21:"SEO Expert Consultant";s:10:"start_date";s:10:"2019-04-18";s:8:"end_date";s:10:"2019-04-20";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}i:1;a:5:{s:9:"job_title";s:13:"Start & Sound";s:10:"start_date";s:10:"2019-04-26";s:8:"end_date";s:10:"2019-04-28";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'education' => 'a:1:{i:0;a:5:{s:12:"degree_title";s:22:"Information Technology";s:10:"start_date";s:10:"2019-04-09";s:8:"end_date";s:10:"2019-04-17";s:15:"institute_title";s:35:"Arbeitshilfe Institute of Technology";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'awards' => 'a:4:{i:0;a:3:{s:11:"award_title";s:10:"Best Theme";s:10:"award_date";s:8:"12-12-31";s:18:"award_hidden_image";s:22:"15543822240-img-03.jpg";}i:1;a:3:{s:11:"award_title";s:23:"Monster Developer Award";s:10:"award_date";s:8:"12-01-14";s:18:"award_hidden_image";s:22:"15544736871-img-09.jpg";}i:2;a:3:{s:11:"award_title";s:23:"Best Communication 2015";s:10:"award_date";s:8:"19-02-01";s:18:"award_hidden_image";s:22:"15544736872-img-10.jpg";}i:3;a:3:{s:11:"award_title";s:23:"Best Logo Design Winner";s:10:"award_date";s:8:"20-10-09";s:18:"award_hidden_image";s:22:"15544736873-img-12.jpg";}}',

                    'projects' => 'a:6:{i:0;a:3:{s:13:"project_title";s:8:"Arbeitshilfe";s:11:"project_url";s:39:"http://www.arbeitshilfe.website/projects/arbeitshilfe";s:20:"project_hidden_image";s:26:"15543822240-banner-img.jpg";}i:1;a:3:{s:13:"project_title";s:9:"Videohive";s:11:"project_url";s:17:"www.videohive.net";s:20:"project_hidden_image";s:10:"img-01.jpg";}i:2;a:3:{s:13:"project_title";s:10:"Codecanyon";s:11:"project_url";s:18:"www.codecanyon.net";s:20:"project_hidden_image";s:10:"img-03.jpg";}i:3;a:3:{s:13:"project_title";s:12:"Graphicriver";s:11:"project_url";s:20:"www.graphicriver.net";s:20:"project_hidden_image";s:10:"img-04.jpg";}i:4;a:3:{s:13:"project_title";s:9:"Photodune";s:11:"project_url";s:17:"www.photodune.net";s:20:"project_hidden_image";s:10:"img-05.jpg";}i:5;a:3:{s:13:"project_title";s:11:"Audiojungle";s:11:"project_url";s:19:"www.audiojungle.net";s:20:"project_hidden_image";s:10:"img-06.jpg";}}',

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Western Souk & Mall Tarif - Liwa Rd Abu Dhabi United Arab Emirate',

                    'longitude' => '53.7038487195968',

                    'latitude' => '23.6499492330274',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => 'male',

                    'tagline' => 'Driving the Communication Revolution',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '19',

                    'department_id' => null,

                    'no_of_employees' => null,

                    'freelancer_type' => 'independent',

                    'english_level' => 'professional',

                    'hourly_rate' => '84',

                    'experience' => 'a:2:{i:0;a:5:{s:9:"job_title";s:21:"SEO Expert Consultant";s:10:"start_date";s:10:"2019-04-18";s:8:"end_date";s:10:"2019-04-20";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}i:1;a:5:{s:9:"job_title";s:13:"Start & Sound";s:10:"start_date";s:10:"2019-04-26";s:8:"end_date";s:10:"2019-04-28";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'education' => 'a:1:{i:0;a:5:{s:12:"degree_title";s:22:"Information Technology";s:10:"start_date";s:10:"2019-04-09";s:8:"end_date";s:10:"2019-04-17";s:15:"institute_title";s:35:"Arbeitshilfe Institute of Technology";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'awards' => 'a:4:{i:0;a:3:{s:11:"award_title";s:10:"Best Theme";s:10:"award_date";s:8:"12-12-31";s:18:"award_hidden_image";s:22:"15543822240-img-03.jpg";}i:1;a:3:{s:11:"award_title";s:23:"Monster Developer Award";s:10:"award_date";s:8:"12-01-14";s:18:"award_hidden_image";s:22:"15544736871-img-09.jpg";}i:2;a:3:{s:11:"award_title";s:23:"Best Communication 2015";s:10:"award_date";s:8:"19-02-01";s:18:"award_hidden_image";s:22:"15544736872-img-10.jpg";}i:3;a:3:{s:11:"award_title";s:23:"Best Logo Design Winner";s:10:"award_date";s:8:"20-10-09";s:18:"award_hidden_image";s:22:"15544736873-img-12.jpg";}}',

                    'projects' => 'a:6:{i:0;a:3:{s:13:"project_title";s:8:"Arbeitshilfe";s:11:"project_url";s:39:"http://www.arbeitshilfe.website/projects/arbeitshilfe";s:20:"project_hidden_image";s:26:"15543822240-banner-img.jpg";}i:1;a:3:{s:13:"project_title";s:9:"Videohive";s:11:"project_url";s:17:"www.videohive.net";s:20:"project_hidden_image";s:10:"img-01.jpg";}i:2;a:3:{s:13:"project_title";s:10:"Codecanyon";s:11:"project_url";s:18:"www.codecanyon.net";s:20:"project_hidden_image";s:10:"img-03.jpg";}i:3;a:3:{s:13:"project_title";s:12:"Graphicriver";s:11:"project_url";s:20:"www.graphicriver.net";s:20:"project_hidden_image";s:10:"img-04.jpg";}i:4;a:3:{s:13:"project_title";s:9:"Photodune";s:11:"project_url";s:17:"www.photodune.net";s:20:"project_hidden_image";s:10:"img-05.jpg";}i:5;a:3:{s:13:"project_title";s:11:"Audiojungle";s:11:"project_url";s:19:"www.audiojungle.net";s:20:"project_hidden_image";s:10:"img-06.jpg";}}',

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Madinat Zayed Adult Education Center for Female Abu Dhabi United Arab Emirates',

                    'longitude' => '53.704422712326',

                    'latitude' => '23.6435928614812',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => 'female',

                    'tagline' => 'Effortlessly manages all your information',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '20',

                    'department_id' => null,

                    'no_of_employees' => null,

                    'freelancer_type' => 'independent',

                    'english_level' => 'conversational',

                    'hourly_rate' => '55',

                    'experience' => 'a:2:{i:0;a:5:{s:9:"job_title";s:21:"SEO Expert Consultant";s:10:"start_date";s:10:"2019-04-18";s:8:"end_date";s:10:"2019-04-20";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}i:1;a:5:{s:9:"job_title";s:13:"Start & Sound";s:10:"start_date";s:10:"2019-04-26";s:8:"end_date";s:10:"2019-04-28";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'education' => 'a:1:{i:0;a:5:{s:12:"degree_title";s:22:"Information Technology";s:10:"start_date";s:10:"2019-04-09";s:8:"end_date";s:10:"2019-04-17";s:15:"institute_title";s:35:"Arbeitshilfe Institute of Technology";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'awards' => 'a:4:{i:0;a:3:{s:11:"award_title";s:10:"Best Theme";s:10:"award_date";s:8:"12-12-31";s:18:"award_hidden_image";s:22:"15543822240-img-03.jpg";}i:1;a:3:{s:11:"award_title";s:23:"Monster Developer Award";s:10:"award_date";s:8:"12-01-14";s:18:"award_hidden_image";s:22:"15544736871-img-09.jpg";}i:2;a:3:{s:11:"award_title";s:23:"Best Communication 2015";s:10:"award_date";s:8:"19-02-01";s:18:"award_hidden_image";s:22:"15544736872-img-10.jpg";}i:3;a:3:{s:11:"award_title";s:23:"Best Logo Design Winner";s:10:"award_date";s:8:"20-10-09";s:18:"award_hidden_image";s:22:"15544736873-img-12.jpg";}}',

                    'projects' => 'a:6:{i:0;a:3:{s:13:"project_title";s:8:"Arbeitshilfe";s:11:"project_url";s:39:"http://www.arbeitshilfe.website/projects/arbeitshilfe";s:20:"project_hidden_image";s:26:"15543822240-banner-img.jpg";}i:1;a:3:{s:13:"project_title";s:9:"Videohive";s:11:"project_url";s:17:"www.videohive.net";s:20:"project_hidden_image";s:10:"img-01.jpg";}i:2;a:3:{s:13:"project_title";s:10:"Codecanyon";s:11:"project_url";s:18:"www.codecanyon.net";s:20:"project_hidden_image";s:10:"img-03.jpg";}i:3;a:3:{s:13:"project_title";s:12:"Graphicriver";s:11:"project_url";s:20:"www.graphicriver.net";s:20:"project_hidden_image";s:10:"img-04.jpg";}i:4;a:3:{s:13:"project_title";s:9:"Photodune";s:11:"project_url";s:17:"www.photodune.net";s:20:"project_hidden_image";s:10:"img-05.jpg";}i:5;a:3:{s:13:"project_title";s:11:"Audiojungle";s:11:"project_url";s:19:"www.audiojungle.net";s:20:"project_hidden_image";s:10:"img-06.jpg";}}',

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Thomas Sherriff & Co Ltd Old Bongate Mill Bongate Jedburgh TD8 6DU UK',

                    'longitude' => '-2.54719734191894',

                    'latitude' => '55.4847967166874',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => 'female',

                    'tagline' => 'Experience IT',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '21',

                    'department_id' => null,

                    'no_of_employees' => null,

                    'freelancer_type' => 'rising_talent',

                    'english_level' => 'professional',

                    'hourly_rate' => '12',

                    'experience' => 'a:2:{i:0;a:5:{s:9:"job_title";s:21:"SEO Expert Consultant";s:10:"start_date";s:10:"2019-04-18";s:8:"end_date";s:10:"2019-04-20";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}i:1;a:5:{s:9:"job_title";s:13:"Start & Sound";s:10:"start_date";s:10:"2019-04-26";s:8:"end_date";s:10:"2019-04-28";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'education' => 'a:1:{i:0;a:5:{s:12:"degree_title";s:22:"Information Technology";s:10:"start_date";s:10:"2019-04-09";s:8:"end_date";s:10:"2019-04-17";s:15:"institute_title";s:35:"Arbeitshilfe Institute of Technology";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'awards' => 'a:4:{i:0;a:3:{s:11:"award_title";s:10:"Best Theme";s:10:"award_date";s:8:"12-12-31";s:18:"award_hidden_image";s:22:"15543822240-img-03.jpg";}i:1;a:3:{s:11:"award_title";s:23:"Monster Developer Award";s:10:"award_date";s:8:"12-01-14";s:18:"award_hidden_image";s:22:"15544736871-img-09.jpg";}i:2;a:3:{s:11:"award_title";s:23:"Best Communication 2015";s:10:"award_date";s:8:"19-02-01";s:18:"award_hidden_image";s:22:"15544736872-img-10.jpg";}i:3;a:3:{s:11:"award_title";s:23:"Best Logo Design Winner";s:10:"award_date";s:8:"20-10-09";s:18:"award_hidden_image";s:22:"15544736873-img-12.jpg";}}',

                    'projects' => 'a:6:{i:0;a:3:{s:13:"project_title";s:8:"Arbeitshilfe";s:11:"project_url";s:39:"http://www.arbeitshilfe.website/projects/arbeitshilfe";s:20:"project_hidden_image";s:26:"15543822240-banner-img.jpg";}i:1;a:3:{s:13:"project_title";s:9:"Videohive";s:11:"project_url";s:17:"www.videohive.net";s:20:"project_hidden_image";s:10:"img-01.jpg";}i:2;a:3:{s:13:"project_title";s:10:"Codecanyon";s:11:"project_url";s:18:"www.codecanyon.net";s:20:"project_hidden_image";s:10:"img-03.jpg";}i:3;a:3:{s:13:"project_title";s:12:"Graphicriver";s:11:"project_url";s:20:"www.graphicriver.net";s:20:"project_hidden_image";s:10:"img-04.jpg";}i:4;a:3:{s:13:"project_title";s:9:"Photodune";s:11:"project_url";s:17:"www.photodune.net";s:20:"project_hidden_image";s:10:"img-05.jpg";}i:5;a:3:{s:13:"project_title";s:11:"Audiojungle";s:11:"project_url";s:19:"www.audiojungle.net";s:20:"project_hidden_image";s:10:"img-06.jpg";}}',

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Jed Tyre & Exhaust Centre Friars Burn/High St Jedburgh TD8 6AG UK',

                    'longitude' => '-2.55555510520935',

                    'latitude' => '55.4785859361283',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => 'male',

                    'tagline' => 'How Communication Happens',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '22',

                    'department_id' => null,

                    'no_of_employees' => null,

                    'freelancer_type' => 'rising_talent',

                    'english_level' => 'fluent',

                    'hourly_rate' => '98',

                    'experience' => 'a:2:{i:0;a:5:{s:9:"job_title";s:21:"SEO Expert Consultant";s:10:"start_date";s:10:"2019-04-18";s:8:"end_date";s:10:"2019-04-20";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}i:1;a:5:{s:9:"job_title";s:13:"Start & Sound";s:10:"start_date";s:10:"2019-04-26";s:8:"end_date";s:10:"2019-04-28";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'education' => 'a:1:{i:0;a:5:{s:12:"degree_title";s:22:"Information Technology";s:10:"start_date";s:10:"2019-04-09";s:8:"end_date";s:10:"2019-04-17";s:15:"institute_title";s:35:"Arbeitshilfe Institute of Technology";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'awards' => 'a:4:{i:0;a:3:{s:11:"award_title";s:10:"Best Theme";s:10:"award_date";s:8:"12-12-31";s:18:"award_hidden_image";s:22:"15543822240-img-03.jpg";}i:1;a:3:{s:11:"award_title";s:23:"Monster Developer Award";s:10:"award_date";s:8:"12-01-14";s:18:"award_hidden_image";s:22:"15544736871-img-09.jpg";}i:2;a:3:{s:11:"award_title";s:23:"Best Communication 2015";s:10:"award_date";s:8:"19-02-01";s:18:"award_hidden_image";s:22:"15544736872-img-10.jpg";}i:3;a:3:{s:11:"award_title";s:23:"Best Logo Design Winner";s:10:"award_date";s:8:"20-10-09";s:18:"award_hidden_image";s:22:"15544736873-img-12.jpg";}}',

                    'projects' => 'a:6:{i:0;a:3:{s:13:"project_title";s:8:"Arbeitshilfe";s:11:"project_url";s:39:"http://www.arbeitshilfe.website/projects/arbeitshilfe";s:20:"project_hidden_image";s:26:"15543822240-banner-img.jpg";}i:1;a:3:{s:13:"project_title";s:9:"Videohive";s:11:"project_url";s:17:"www.videohive.net";s:20:"project_hidden_image";s:10:"img-01.jpg";}i:2;a:3:{s:13:"project_title";s:10:"Codecanyon";s:11:"project_url";s:18:"www.codecanyon.net";s:20:"project_hidden_image";s:10:"img-03.jpg";}i:3;a:3:{s:13:"project_title";s:12:"Graphicriver";s:11:"project_url";s:20:"www.graphicriver.net";s:20:"project_hidden_image";s:10:"img-04.jpg";}i:4;a:3:{s:13:"project_title";s:9:"Photodune";s:11:"project_url";s:17:"www.photodune.net";s:20:"project_hidden_image";s:10:"img-05.jpg";}i:5;a:3:{s:13:"project_title";s:11:"Audiojungle";s:11:"project_url";s:19:"www.audiojungle.net";s:20:"project_hidden_image";s:10:"img-06.jpg";}}',

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Hassendean Station Cottage 2 Hassendean Station Hawick TD9 8PX UK',

                    'longitude' => '-2.71619260311126',

                    'latitude' => '55.4753116211057',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => 'male',

                    'tagline' => 'High Performance Delivered',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '23',

                    'department_id' => null,

                    'no_of_employees' => null,

                    'freelancer_type' => 'agency',

                    'english_level' => 'native',

                    'hourly_rate' => '47',

                    'experience' => 'a:2:{i:0;a:5:{s:9:"job_title";s:21:"SEO Expert Consultant";s:10:"start_date";s:10:"2019-04-18";s:8:"end_date";s:10:"2019-04-20";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}i:1;a:5:{s:9:"job_title";s:13:"Start & Sound";s:10:"start_date";s:10:"2019-04-26";s:8:"end_date";s:10:"2019-04-28";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'education' => 'a:1:{i:0;a:5:{s:12:"degree_title";s:22:"Information Technology";s:10:"start_date";s:10:"2019-04-09";s:8:"end_date";s:10:"2019-04-17";s:15:"institute_title";s:35:"Arbeitshilfe Institute of Technology";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'awards' => 'a:4:{i:0;a:3:{s:11:"award_title";s:10:"Best Theme";s:10:"award_date";s:8:"12-12-31";s:18:"award_hidden_image";s:22:"15543822240-img-03.jpg";}i:1;a:3:{s:11:"award_title";s:23:"Monster Developer Award";s:10:"award_date";s:8:"12-01-14";s:18:"award_hidden_image";s:22:"15544736871-img-09.jpg";}i:2;a:3:{s:11:"award_title";s:23:"Best Communication 2015";s:10:"award_date";s:8:"19-02-01";s:18:"award_hidden_image";s:22:"15544736872-img-10.jpg";}i:3;a:3:{s:11:"award_title";s:23:"Best Logo Design Winner";s:10:"award_date";s:8:"20-10-09";s:18:"award_hidden_image";s:22:"15544736873-img-12.jpg";}}',

                    'projects' => 'a:6:{i:0;a:3:{s:13:"project_title";s:8:"Arbeitshilfe";s:11:"project_url";s:39:"http://www.arbeitshilfe.website/projects/arbeitshilfe";s:20:"project_hidden_image";s:26:"15543822240-banner-img.jpg";}i:1;a:3:{s:13:"project_title";s:9:"Videohive";s:11:"project_url";s:17:"www.videohive.net";s:20:"project_hidden_image";s:10:"img-01.jpg";}i:2;a:3:{s:13:"project_title";s:10:"Codecanyon";s:11:"project_url";s:18:"www.codecanyon.net";s:20:"project_hidden_image";s:10:"img-03.jpg";}i:3;a:3:{s:13:"project_title";s:12:"Graphicriver";s:11:"project_url";s:20:"www.graphicriver.net";s:20:"project_hidden_image";s:10:"img-04.jpg";}i:4;a:3:{s:13:"project_title";s:9:"Photodune";s:11:"project_url";s:17:"www.photodune.net";s:20:"project_hidden_image";s:10:"img-05.jpg";}i:5;a:3:{s:13:"project_title";s:11:"Audiojungle";s:11:"project_url";s:19:"www.audiojungle.net";s:20:"project_hidden_image";s:10:"img-06.jpg";}}',

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Christmas City Gifts 609 S Nance Ave Minden, NE 68959',

                    'longitude' => '-98.95441532135',

                    'latitude' => '40.4909568065246',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => 'female',

                    'tagline' => 'Imagination at Work',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

                [

                    'user_id' => '24',

                    'department_id' => null,

                    'no_of_employees' => null,

                    'freelancer_type' => 'independent',

                    'english_level' => 'basic',

                    'hourly_rate' => '25',

                    'experience' => 'a:2:{i:0;a:5:{s:9:"job_title";s:21:"SEO Expert Consultant";s:10:"start_date";s:10:"2019-04-18";s:8:"end_date";s:10:"2019-04-20";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}i:1;a:5:{s:9:"job_title";s:13:"Start & Sound";s:10:"start_date";s:10:"2019-04-26";s:8:"end_date";s:10:"2019-04-28";s:13:"company_title";s:10:"Arbeitshilfe";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'education' => 'a:1:{i:0;a:5:{s:12:"degree_title";s:22:"Information Technology";s:10:"start_date";s:10:"2019-04-09";s:8:"end_date";s:10:"2019-04-17";s:15:"institute_title";s:35:"Arbeitshilfe Institute of Technology";s:11:"description";s:461:"Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.";}}',

                    'awards' => 'a:4:{i:0;a:3:{s:11:"award_title";s:10:"Best Theme";s:10:"award_date";s:8:"12-12-31";s:18:"award_hidden_image";s:22:"15543822240-img-03.jpg";}i:1;a:3:{s:11:"award_title";s:23:"Monster Developer Award";s:10:"award_date";s:8:"12-01-14";s:18:"award_hidden_image";s:22:"15544736871-img-09.jpg";}i:2;a:3:{s:11:"award_title";s:23:"Best Communication 2015";s:10:"award_date";s:8:"19-02-01";s:18:"award_hidden_image";s:22:"15544736872-img-10.jpg";}i:3;a:3:{s:11:"award_title";s:23:"Best Logo Design Winner";s:10:"award_date";s:8:"20-10-09";s:18:"award_hidden_image";s:22:"15544736873-img-12.jpg";}}',

                    'projects' => 'a:6:{i:0;a:3:{s:13:"project_title";s:8:"Arbeitshilfe";s:11:"project_url";s:39:"http://www.arbeitshilfe.website/projects/arbeitshilfe";s:20:"project_hidden_image";s:26:"15543822240-banner-img.jpg";}i:1;a:3:{s:13:"project_title";s:9:"Videohive";s:11:"project_url";s:17:"www.videohive.net";s:20:"project_hidden_image";s:10:"img-01.jpg";}i:2;a:3:{s:13:"project_title";s:10:"Codecanyon";s:11:"project_url";s:18:"www.codecanyon.net";s:20:"project_hidden_image";s:10:"img-03.jpg";}i:3;a:3:{s:13:"project_title";s:12:"Graphicriver";s:11:"project_url";s:20:"www.graphicriver.net";s:20:"project_hidden_image";s:10:"img-04.jpg";}i:4;a:3:{s:13:"project_title";s:9:"Photodune";s:11:"project_url";s:17:"www.photodune.net";s:20:"project_hidden_image";s:10:"img-05.jpg";}i:5;a:3:{s:13:"project_title";s:11:"Audiojungle";s:11:"project_url";s:19:"www.audiojungle.net";s:20:"project_hidden_image";s:10:"img-06.jpg";}}',

                    'saved_jobs' => null,

                    'saved_employers' => null,

                    'ratings' => null,

                    'address' => 'Pioneer Aerial Applicators 886 W St Clair St Minden, NE 68959',

                    'longitude' => '-98.9599245786666',

                    'latitude' => '40.4894003885342',

                    'avater' => 'a.jpg',

                    'banner' => 'b.jpg',

                    'gender' => 'male',

                    'tagline' => 'Innovation and Excellence',

                    'description' => 'Excepteur sint occaecat cupidatat non proident, saeunt in culpa qui officia deserunt mollit anim laborum. Seden utem perspiciatis undesieu omnis voluptatem accusantium doque laudantium, totam rem aiam eaqueiu ipsa quae ab illoion inventore veritatisetm quasitea architecto beataea dictaed quia couuntur magni dolores eos aquist ratione vtatem seque nesnt. Neque porro quamest quioremas ipsum quiatem dolor sitem ameteism conctetur adipisci velit sedate quianon.

Laborum sed ut perspiciatis unde omnis iste natus error sitems voluptatem accusantium doloremque laudantium, totam rem aiam eaque ipsa quae ab illo inventore veritatis etna quasi architecto beatae vitae dictation explicabo. nemo enim ipsam fugit.',

                    'delete_reason' => null,

                    'delete_description' => null,

                    'profile_searchable' => null,

                    'profile_blocked' => null,

                    'weekly_alerts' => null,

                    'message_alerts' => null,

                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),

                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],

            ]

        );

    }

}

