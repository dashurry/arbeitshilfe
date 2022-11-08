<?php

/**

 * Breadcrumbs registration

 *

 * @category Arbeitshilfe

 *

 * @package Arbeitshilfe

 * @author  Mauro Frappietro <hello@maurofrappietro.com>

 * @license https://maurofrappietro.com/ Arbeitshilfe

 * @link    https://maurofrappietro.com/

 */

Breadcrumbs::for(

    'home', function ($trail) {

        $trail->push(trans('lang.home'), route('home'));

    }

);



Breadcrumbs::for(

    'jobs', function ($trail) {

        $trail->parent('home');

        $trail->push(trans('lang.jobs'), route('jobs'));

    }

);



Breadcrumbs::for(

    'jobDetail', function ($trail, $slug) {

        $trail->parent('jobs');

        $trail->push(trans('lang.job_detail'), route('jobDetail', ['slug' => $slug]));

    }

);



Breadcrumbs::for(

    'services', function ($trail) {

        $trail->parent('home');

        $trail->push(trans('lang.services'), route('services'));

    }

);



Breadcrumbs::for(

    'serviceDetail', function ($trail, $slug) {

        $trail->parent('services');

        $trail->push(trans('lang.service_detail'), route('serviceDetail', ['slug' => $slug]));

    }

);



Breadcrumbs::for(

    'createProposal', function ($trail, $slug) {

        $trail->parent('jobDetail', $slug);

        $trail->push(trans('lang.job_proposals'), route('createProposal', ['job_slug' => $slug]));

    }

);



Breadcrumbs::for(

    'employerJobs', function ($trail, $slug) {

        $trail->parent('jobs');

        $trail->push(trans('lang.employer_jobs'), route('employerJobs', ['slug' => $slug]));

    }

);



Breadcrumbs::for(

    'searchResults', function ($trail) {

        $trail->parent('home');

        $trail->push(trans('lang.search_results'), route('searchResults'));

    }

);



Breadcrumbs::for(

    'showPage', function ($trail, $page, $slug) {

        $trail->parent('home');

        if (!empty($page)) {

            $trail->push($page['title'], route('showPage', ['slug' => $slug]));

        }

    }

);



Breadcrumbs::for(

    'userListing', function ($trail) {

        $trail->parent('home');

        $trail->push(trans('lang.users'), route('userListing'));

    }

);



Breadcrumbs::for(

    'showUserProfile', function ($trail, $slug) {

        $trail->parent('home');

        $trail->push(trans('lang.profile'), route('showUserProfile', ['slug' => $slug]));

    }

);



Breadcrumbs::for(

    'categoriesListing', function ($trail) {

        $trail->parent('home');

        $trail->push(trans('lang.cats'), route('categoriesList'));

    }

);



Breadcrumbs::for(

    'registerPage', function ($trail) {

        $trail->parent('home');

        $trail->push(trans('lang.join_now'), route('home'));

    }

);



Breadcrumbs::for(

    'notFound', function ($trail) {

        $trail->parent('home');

        $trail->push(trans('lang.404_error'), route('home'));

    }

);



Breadcrumbs::for(

    'accessDenied', function ($trail) {

        $trail->parent('home');

        $trail->push(trans('lang.no_permission'), route('home'));

    }

);



Breadcrumbs::for(

    'raiseDispute', function ($trail) {

        $trail->parent('home');

        $trail->push(trans('lang.raise_dispute'), route('home'));

    }

);



