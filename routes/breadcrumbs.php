<?php

use App\Entity\Project\Developer;
use App\Entity\Project\Facility;
use App\Entity\Project\Projects\Plan;
use App\Entity\Project\Projects\Project;
use App\Entity\Project\Characteristic;
use App\Entity\Banner\Banner;
use App\Entity\Page;
use App\Entity\Project\Projects\SaleOffice;
use App\Entity\Region;
use App\Entity\Ticket\Ticket;
use App\Entity\User\User;
use App\Http\Router\ProjectsPath;
use App\Http\Router\PagePath;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as Crumbs;
use App\Entity\Category;

Breadcrumbs::for('home', function (Crumbs $crumbs) {
    $crumbs->push(trans('adminlte.home'), route('home'));
});

Breadcrumbs::for('login', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push(trans('adminlte.sign_in'), route('login'));
});

Breadcrumbs::for('login.phone', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push(trans('adminlte.sign_in'), route('login.phone'));
});

Breadcrumbs::for('register', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push(trans('adminlte.register'), route('register'));
});

Breadcrumbs::for('password.request', function (Crumbs $crumbs) {
    $crumbs->parent('login');
    $crumbs->push(trans('adminlte.reset_password'), route('password.request'));
});

Breadcrumbs::for('password.reset', function (Crumbs $crumbs) {
    $crumbs->parent('password.request');
    $crumbs->push(trans('adminlte.change_password'), route('password.reset'));
});

Breadcrumbs::for('page', function (Crumbs $crumbs, PagePath $path) {
    if ($parent = $path->page->parent) {
        $crumbs->parent('page', $path->withPage($path->page->parent));
    } else {
        $crumbs->parent('home');
    }
    $crumbs->push($path->page->title, route('page', $path));
});

// Projects

Breadcrumbs::for('projects.inner_region', function (Crumbs $crumbs, ProjectsPath $path) {
    if ($path->region && $parent = $path->region->parent) {
        $crumbs->parent('projects.inner_region', $path->withRegion($parent));
    } else {
        $crumbs->parent('home');
        $crumbs->push(trans('adminlte.projects'), route('projects.index'));
    }
    if ($path->region) {
        $crumbs->push($path->region->name, route('projects.index', $path));
    }
});

Breadcrumbs::for('projects.inner_category', function (Crumbs $crumbs, ProjectsPath $path, ProjectsPath $orig) {
    if ($path->category && $parent = $path->category->parent) {
        $crumbs->parent('projects.inner_category', $path->withCategory($parent), $orig);
    } else {
        $crumbs->parent('projects.inner_region', $orig);
    }
    if ($path->category) {
        $crumbs->push($path->category->name, route('projects.index', $path));
    }
});

Breadcrumbs::for('projects.index', function (Crumbs $crumbs, ProjectsPath $path = null) {
    $path = $path ?: projects_path(null, null);
    $crumbs->parent('projects.inner_category', $path, $path);
});

Breadcrumbs::for('projects.show', function (Crumbs $crumbs, Project $project) {
    $crumbs->parent('projects.index', projects_path($project->region, $project->category));
    $crumbs->push($project->title, route('projects.show', $project));
});

// Cabinet

Breadcrumbs::for('cabinet.home', function (Crumbs $crumbs) {
    $crumbs->parent('home');
    $crumbs->push('Cabinet', route('cabinet.home'));
});

Breadcrumbs::for('cabinet.profile.home', function (Crumbs $crumbs) {
    $crumbs->parent('cabinet.home');
    $crumbs->push('Profile', route('cabinet.profile.home'));
});

Breadcrumbs::for('cabinet.profile.edit', function (Crumbs $crumbs) {
    $crumbs->parent('cabinet.profile.home');
    $crumbs->push(trans('adminlte.edit'), route('cabinet.profile.edit'));
});

Breadcrumbs::for('cabinet.profile.phone', function (Crumbs $crumbs) {
    $crumbs->parent('cabinet.profile.home');
    $crumbs->push('Phone', route('cabinet.profile.phone'));
});

// Cabinet Projects

Breadcrumbs::for('cabinet.projects.index', function (Crumbs $crumbs) {
    $crumbs->parent('cabinet.home');
    $crumbs->push(trans('adminlte.projects'), route('cabinet.projects.index'));
});

Breadcrumbs::for('cabinet.projects.create', function (Crumbs $crumbs) {
    $crumbs->parent('projects.index');
    $crumbs->push(trans('adminlte.create'), route('cabinet.projects.create'));
});

Breadcrumbs::for('cabinet.projects.create.region', function (Crumbs $crumbs, Category $category, Region $region = null) {
    $crumbs->parent('cabinet.projects.create');
    $crumbs->push($category->name, route('cabinet.projects.create.region', [$category, $region]));
});

Breadcrumbs::for('cabinet.projects.create.project', function (Crumbs $crumbs, Category $category, Region $region = null) {
    $crumbs->parent('cabinet.projects.create.region', $category, $region);
    $crumbs->push($region ? $region->name : 'All', route('cabinet.projects.create.project', [$category, $region]));
});

// Favorites

Breadcrumbs::for('cabinet.favorites.index', function (Crumbs $crumbs) {
    $crumbs->parent('cabinet.home');
    $crumbs->push('Projects', route('cabinet.favorites.index'));
});

// Cabinet Banners

Breadcrumbs::for('cabinet.banners.index', function (Crumbs $crumbs) {
    $crumbs->parent('cabinet.home');
    $crumbs->push('Banners', route('cabinet.banners.index'));
});

Breadcrumbs::for('cabinet.banners.show', function (Crumbs $crumbs, Banner $banner) {
    $crumbs->parent('cabinet.banners.index');
    $crumbs->push($banner->name, route('cabinet.banners.show', $banner));
});

Breadcrumbs::for('cabinet.banners.edit', function (Crumbs $crumbs, Banner $banner) {
    $crumbs->parent('cabinet.banners.show', $banner);
    $crumbs->push(trans('adminlte.edit'), route('cabinet.banners.edit', $banner));
});

Breadcrumbs::for('cabinet.banners.file', function (Crumbs $crumbs, Banner $banner) {
    $crumbs->parent('cabinet.banners.show', $banner);
    $crumbs->push('File', route('cabinet.banners.file', $banner));
});

Breadcrumbs::for('cabinet.banners.create', function (Crumbs $crumbs) {
    $crumbs->parent('cabinet.banners.index');
    $crumbs->push(trans('adminlte.create'), route('cabinet.banners.create'));
});

Breadcrumbs::for('cabinet.banners.create.region', function (Crumbs $crumbs, Category $category, Region $region = null) {
    $crumbs->parent('cabinet.banners.create');
    $crumbs->push($category->name, route('cabinet.banners.create.region', [$category, $region]));
});

Breadcrumbs::for('cabinet.banners.create.banner', function (Crumbs $crumbs, Category $category, Region $region = null) {
    $crumbs->parent('cabinet.banners.create.region', $category, $region);
    $crumbs->push($region ? $region->name : 'All', route('cabinet.banners.create.banner', [$category, $region]));
});

// Cabinet Tickets

Breadcrumbs::for('cabinet.tickets.index', function (Crumbs $crumbs) {
    $crumbs->parent('cabinet.home');
    $crumbs->push('Tickets', route('cabinet.tickets.index'));
});

Breadcrumbs::for('cabinet.tickets.create', function (Crumbs $crumbs) {
    $crumbs->parent('cabinet.tickets.index');
    $crumbs->push(trans('adminlte.create'), route('cabinet.tickets.create'));
});

Breadcrumbs::for('cabinet.tickets.show', function (Crumbs $crumbs, Ticket $ticket) {
    $crumbs->parent('cabinet.tickets.index');
    $crumbs->push($ticket->subject, route('cabinet.tickets.show', $ticket));
});

// Admin

Breadcrumbs::for('admin.home', function (Crumbs $crumbs) {
//    $crumbs->parent('home');
    $crumbs->push(trans('adminlte.home'), route('admin.home'));
});

// Users

Breadcrumbs::for('admin.users.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('adminlte.users'), route('admin.users.index'));
});

Breadcrumbs::for('admin.users.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.users.index');
    $crumbs->push(trans('adminlte.create'), route('admin.users.create'));
});

Breadcrumbs::for('admin.users.show', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('admin.users.index');
    $crumbs->push($user->name, route('admin.users.show', $user));
});

Breadcrumbs::for('admin.users.edit', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('admin.users.show', $user);
    $crumbs->push(trans('adminlte.edit'), route('admin.users.edit', $user));
});
// Pages

Breadcrumbs::for('admin.pages.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Pages', route('admin.pages.index'));
});

Breadcrumbs::for('admin.pages.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.pages.index');
    $crumbs->push(trans('adminlte.create'), route('admin.pages.create'));
});

Breadcrumbs::for('admin.pages.show', function (Crumbs $crumbs, Page $page) {
    if ($parent = $page->parent) {
        $crumbs->parent('admin.pages.show', $parent);
    } else {
        $crumbs->parent('admin.pages.index');
    }
    $crumbs->push($page->title, route('admin.pages.show', $page));
});

Breadcrumbs::for('admin.pages.edit', function (Crumbs $crumbs, Page $page) {
    $crumbs->parent('admin.pages.show', $page);
    $crumbs->push(trans('adminlte.edit'), route('admin.pages.edit', $page));
});

// Banners

Breadcrumbs::for('admin.banners.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Banners', route('admin.banners.index'));
});

Breadcrumbs::for('admin.banners.show', function (Crumbs $crumbs, Banner $banner) {
    $crumbs->parent('admin.banners.index');
    $crumbs->push($banner->name, route('admin.banners.show', $banner));
});

Breadcrumbs::for('admin.banners.edit', function (Crumbs $crumbs, Banner $banner) {
    $crumbs->parent('admin.banners.show', $banner);
    $crumbs->push(trans('adminlte.edit'), route('admin.banners.edit', $banner));
});

Breadcrumbs::for('admin.banners.reject', function (Crumbs $crumbs, Banner $banner) {
    $crumbs->parent('admin.banners.show', $banner);
    $crumbs->push('Reject', route('admin.banners.reject', $banner));
});

// Tickets

Breadcrumbs::for('admin.tickets.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Tickets', route('admin.tickets.index'));
});

Breadcrumbs::for('admin.tickets.show', function (Crumbs $crumbs, Ticket $ticket) {
    $crumbs->parent('admin.tickets.index');
    $crumbs->push($ticket->subject, route('admin.tickets.show', $ticket));
});

Breadcrumbs::for('admin.tickets.edit', function (Crumbs $crumbs, Ticket $ticket) {
    $crumbs->parent('admin.tickets.show', $ticket);
    $crumbs->push(trans('adminlte.edit'), route('admin.tickets.edit', $ticket));
});

// Regions

Breadcrumbs::for('admin.regions.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Regions', route('admin.regions.index'));
});

Breadcrumbs::for('admin.regions.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.regions.index');
    $crumbs->push(trans('adminlte.create'), route('admin.regions.create'));
});

Breadcrumbs::for('admin.regions.show', function (Crumbs $crumbs, Region $region) {
    if ($parent = $region->parent) {
        $crumbs->parent('admin.regions.show', $parent);
    } else {
        $crumbs->parent('admin.regions.index');
    }
    $crumbs->push($region->name, route('admin.regions.show', $region));
});

Breadcrumbs::for('admin.regions.edit', function (Crumbs $crumbs, Region $region) {
    $crumbs->parent('admin.regions.show', $region);
    $crumbs->push(trans('adminlte.edit'), route('admin.regions.edit', $region));
});

// Developers

Breadcrumbs::for('admin.project.developers.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Developers', route('admin.project.developers.index'));
});

Breadcrumbs::for('admin.project.users.developers.create', function (Crumbs $crumbs, User $user) {
    $crumbs->parent('admin.project.developers.index');
    $crumbs->push(trans('adminlte.create'), route('admin.project.users.developers.create', $user));
});

Breadcrumbs::for('admin.project.users.developers.show', function (Crumbs $crumbs, User $user, Developer $developer) {
    $crumbs->parent('admin.project.developers.index');
    $crumbs->push($developer->name, route('admin.project.users.developers.show', [$user, $developer]));
});

Breadcrumbs::for('admin.project.users.developers.edit', function (Crumbs $crumbs, User $user, Developer $developer) {
    $crumbs->parent('admin.project.users.developers.show', $user, $developer);
    $crumbs->push('Edit', route('admin.project.users.developers.edit', [$user, $developer]));
});

// Projects

Breadcrumbs::for('admin.project.developers.show', function (Crumbs $crumbs, Developer $developer) {
    $crumbs->parent('admin.project.developers.index');
    $crumbs->push($developer->name, route('admin.project.users.developers.show', ['user' => $developer->owner, 'developer' => $developer]));
});

Breadcrumbs::for('admin.project.projects.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Projects', route('admin.project.projects.index'));
});

Breadcrumbs::for('admin.project.developers.projects.create', function (Crumbs $crumbs, Developer $developer) {
    $crumbs->parent('admin.project.developers.show', $developer);
    $crumbs->push(trans('adminlte.create'), route('admin.project.developers.projects.create', $developer));
});

Breadcrumbs::for('admin.project.developers.projects.show', function (Crumbs $crumbs, Developer $developer, Project $project) {
    $crumbs->parent('admin.project.developers.show', $developer);
    $crumbs->push($project->name, route('admin.project.developers.projects.show', [$developer, $project]));
});

Breadcrumbs::for('admin.project.developers.projects.edit', function (Crumbs $crumbs, Developer $developer, Project $project) {
    $crumbs->parent('admin.project.developers.projects.show', $developer, $project);
    $crumbs->push(trans('adminlte.edit'), route('admin.project.developers.projects.edit', [$developer, $project]));
});

Breadcrumbs::for('admin.project.projects.reject', function (Crumbs $crumbs, Developer $developer, Project $project) {
    $crumbs->parent('admin.project.developers.projects.show', $developer, $project);
    $crumbs->push($project->name, route('admin.project.projects.reject', $project));
});

// Categories

Breadcrumbs::for('admin.categories.index', function ($trail) {
    $trail->push(trans('adminlte.categories.name'), route('admin.categories.index'));
});
Breadcrumbs::for('admin.categories.create', function ($trail) {
    $trail->push(trans('adminlte.create'), route('admin.categories.create'));
});
Breadcrumbs::for('admin.categories.show', function (Crumbs $crumbs, Category $category) {
    if ($parent = $category->parent) {
        $crumbs->parent('admin.categories.show', $parent);
    } else {
        $crumbs->parent('admin.categories.index');
    }
    $crumbs->push($category->name, route('admin.categories.show', $category));
});

Breadcrumbs::for('admin.categories.edit', function (Crumbs $crumbs, Category $category) {
    $crumbs->parent('admin.categories.show', $category);
    $crumbs->push(trans('adminlte.edit'), route('admin.categories.edit', $category));
});

// Project Characteristics

Breadcrumbs::for('admin.project.characteristics.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push(trans('adminlte.characteristics.name'), route('admin.project.characteristics.index'));
});

Breadcrumbs::for('admin.project.characteristics.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.project.characteristics.index');
    $crumbs->push(trans('adminlte.create'), route('admin.project.characteristics.create'));
});

Breadcrumbs::for('admin.project.characteristics.show', function (Crumbs $crumbs, Characteristic $characteristic) {
    $crumbs->parent('admin.project.characteristics.index');
    $crumbs->push($characteristic->name, route('admin.project.characteristics.show', $characteristic));
});

Breadcrumbs::for('admin.project.characteristics.edit', function (Crumbs $crumbs, Characteristic $characteristic) {
    $crumbs->parent('admin.project.characteristics.show', $characteristic);
    $crumbs->push(trans('adminlte.edit'), route('admin.project.characteristics.edit', $characteristic));
});

// Project Values

Breadcrumbs::for('admin.project.projects.show', function (Crumbs $crumbs, Project $project) {
    $crumbs->parent('admin.project.developers.show', $project->developer);
    $crumbs->push($project->name, route('admin.project.developers.projects.show', ['developer' => $project->developer, 'project' => $project]));
});

Breadcrumbs::for('admin.project.projects.values.add', function (Crumbs $crumbs, Project $project) {
    $crumbs->parent('admin.project.projects.show', $project);
    $crumbs->push(trans('adminlte.create'), route('admin.project.projects.values.add', $project));
});

Breadcrumbs::for('admin.project.projects.values.show', function (Crumbs $crumbs, Project $project, Characteristic $characteristic) {
    $crumbs->parent('admin.project.projects.show', $project);
    $crumbs->push($characteristic->name, route('admin.project.projects.values.show', [$project, $characteristic]));
});

Breadcrumbs::for('admin.project.projects.values.edit', function (Crumbs $crumbs, Project $project, Characteristic $characteristic) {
    $crumbs->parent('admin.project.projects.values.show', $project, $characteristic);
    $crumbs->push(trans('adminlte.edit'), route('admin.project.projects.values.edit', [$project, $characteristic]));
});

// Project Photos

Breadcrumbs::for('admin.project.projects.photo', function (Crumbs $crumbs, Project $project) {
    $crumbs->parent('admin.project.projects.show', $project);
    $crumbs->push(trans('adminlte.create'), route('admin.project.projects.photo', $project));
});

// Facilities

Breadcrumbs::for('admin.project.facilities.index', function (Crumbs $crumbs) {
    $crumbs->parent('admin.home');
    $crumbs->push('Facilities', route('admin.project.facilities.index'));
});

Breadcrumbs::for('admin.project.facilities.create', function (Crumbs $crumbs) {
    $crumbs->parent('admin.project.facilities.index');
    $crumbs->push(trans('adminlte.create'), route('admin.project.facilities.create'));
});

Breadcrumbs::for('admin.project.facilities.show', function (Crumbs $crumbs, Facility $facility) {
    $crumbs->parent('admin.project.facilities.index');
    $crumbs->push($facility->name, route('admin.project.facilities.show', $facility));
});

Breadcrumbs::for('admin.project.facilities.edit', function (Crumbs $crumbs, Facility $facility) {
    $crumbs->parent('admin.project.facilities.show', $facility);
    $crumbs->push(trans('adminlte.edit'), route('admin.project.facilities.edit', $facility));
});

// Project facilities

Breadcrumbs::for('admin.project.projects.facilities', function (Crumbs $crumbs, Project $project) {
    $crumbs->parent('admin.project.projects.show', $project);
    $crumbs->push('Add', route('admin.project.projects.facilities', $project));
});

// Project plans

Breadcrumbs::for('admin.project.projects.plans.index', function (Crumbs $crumbs, Project $project) {
    $crumbs->parent('admin.project.projects.show', $project);
    $crumbs->push('Plans');
});

Breadcrumbs::for('admin.project.projects.plans.create', function (Crumbs $crumbs, Project $project) {
    $crumbs->parent('admin.project.projects.plans.index', $project);
    $crumbs->push(trans('adminlte.create'), route('admin.project.projects.plans.create', $project));
});

Breadcrumbs::for('admin.project.projects.plans.show', function (Crumbs $crumbs, Project $project, Plan $plan) {
    $crumbs->parent('admin.project.projects.plans.index', $project);
    $crumbs->push($plan->id, route('admin.project.projects.plans.show', [$project, $plan]));
});

Breadcrumbs::for('admin.project.projects.plans.edit', function (Crumbs $crumbs, Project $project, Plan $plan) {
    $crumbs->parent('admin.project.projects.plans.show', $project, $plan);
    $crumbs->push(trans('adminlte.edit'), route('admin.project.projects.plans.edit', [$project, $plan]));
});

// Developer Sale offices

Breadcrumbs::for('admin.project.developers.sale-offices.create', function (Crumbs $crumbs, Developer $developer) {
    $crumbs->parent('admin.project.developers.show', $developer);
    $crumbs->push(trans('adminlte.create'), route('admin.project.developers.sale-offices.create', $developer));
});

Breadcrumbs::for('admin.project.developers.sale-offices.show', function (Crumbs $crumbs, Developer $developer, SaleOffice $saleOffice) {
    $crumbs->parent('admin.project.developers.show', $developer);
    $crumbs->push($saleOffice->address, route('admin.project.developers.sale-offices.show', [$developer, $saleOffice]));
});

Breadcrumbs::for('admin.project.developers.sale-offices.edit', function (Crumbs $crumbs, Developer $developer, SaleOffice $saleOffice) {
    $crumbs->parent('admin.project.developers.sale-offices.show', $developer, $saleOffice);
    $crumbs->push($saleOffice->address, route('admin.project.developers.sale-offices.edit', [$developer, $saleOffice]));
});