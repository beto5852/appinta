<?php
// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Inicio', url('/admin/'));
});
// Home > Users
Breadcrumbs::register('users', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Lista de usuarios', url('admin/users/'));
});
Breadcrumbs::register('users.create', function($breadcrumbs)
{
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Crear usuario', url('admin/users/create'));
});
Breadcrumbs::register('users.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('users');
    $breadcrumbs->push('editar usuario', url('[admin/users,$user]'));
});
Breadcrumbs::register('users.show', function($breadcrumbs)
{
    $breadcrumbs->parent('users');
    $breadcrumbs->push('ver usuario', url('[admin/users,$user]'));
});
// Home > Practicas
Breadcrumbs::register('practicas', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Lista de prácticas', url('admin/practicas/'));
});
Breadcrumbs::register('practicas.create', function($breadcrumbs)
{
    $breadcrumbs->parent('practicas');
    $breadcrumbs->push('Crear práctica', url('admin/practicas/create'));
});
Breadcrumbs::register('practicas.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('practicas');
    $breadcrumbs->push('Editar práctica', url('[admin/practicas,$practica]'));
});
Breadcrumbs::register('practicas.show', function($breadcrumbs)
{
    $breadcrumbs->parent('practicas');
    $breadcrumbs->push('Ver práctica', url('[admin/practicas/show,$practica]'));
});


// Home > Tecnologias
Breadcrumbs::register('tecnologias', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Lista de tecnológias', url('admin/tecnologias/'));
});
Breadcrumbs::register('tecnologias.create', function($breadcrumbs)
{
    $breadcrumbs->parent('tecnologias');
    $breadcrumbs->push('Crear tecnológias', url('admin/tecnologias/create'));
});
Breadcrumbs::register('tecnologias.edit', function($breadcrumbs)
{
    $breadcrumbs->parent('practicas');
    $breadcrumbs->push('Editar tecnológia', url('[admin/tecnologias,$tecnologia]'));
});
// Home >
Breadcrumbs::register('inicio', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('inicio', url('/'));
});
// Home > Tags
Breadcrumbs::register('tags', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Lista tags', url('admin/tags/'));
});
Breadcrumbs::register('tags.create', function($breadcrumbs)
{
    $breadcrumbs->parent('tags');
    $breadcrumbs->push('Crear tags', url('admin/tags/create'));
});
// Home > cultivos
Breadcrumbs::register('cultivos', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Lista de cultivos', url('admin/cultivos/'));
});

Breadcrumbs::register('cultivos.create', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('crear cultivo', url('admin/cultivos/'));
});





// Home > mensajes
Breadcrumbs::register('mensajes', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Enviar mensaje', url('admin/mensajes/'));
});

// Home > notificaciones
Breadcrumbs::register('notificaciones', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Leer Notificaciones', url('admin/notificaciones/'));
});


