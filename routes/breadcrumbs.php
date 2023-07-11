<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Evento;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('eventos', function (BreadcrumbTrail $trail) {
    $trail->push('Eventos', route('eventos.index'));
});

Breadcrumbs::for('edit-evento', function (BreadcrumbTrail $trail, Evento $evento) {
    $trail->parent('eventos');
    $trail->push($evento->nombre, route('eventos.edit', $evento->id));
});

Breadcrumbs::for('destroy-categorias', function (BreadcrumbTrail $trail,Evento $evento) {
    $trail->parent('edit-evento',$evento);
    $trail->push("Eliminación de categorías", route('subeventos.delete',$evento->id));
});

/*
// Home > Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category));
});
*/
