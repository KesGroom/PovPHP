<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Illuminate\Database\Seeder;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = "http://mariacanoied.herokuapp.com/home";
        $home = "http://mariacanoied.herokuapp.com/pages/";

        /**
         * Permisos de control de usuarios
         * Rol = Coordinador
         * 
         * Permiso padre = Usuario
         */

        $perUsu = new Permiso();
        $perUsu->nombre = 'Usuarios';
        $perUsu->name = 'Users';
        $perUsu->icon = 'people-circle';
        $perUsu->estado = 'Activo';
        $perUsu->save();

        /* Permisos hijo */
        $perHUR = new Permiso();
        $perHUR->nombre = "Usuarios registrados";
        $perHUR->name = "Registered Users";
        $perHUR->url = "http://mariacanoied.herokuapp.com/pages/usuarios/index";
        $perHUR->permiso_padre = $perUsu->id;
        $perHUR->estado = 'Activo';
        $perHUR->save();

        $perRol = new Permiso();
        $perRol->nombre = "Roles";
        $perRol->name = "Roles";
        $perRol->url = $url;
        $perRol->permiso_padre = $perUsu->id;
        $perRol->estado = 'Activo';
        $perRol->save();

        /**
         * Permisos de control de Servicio social
         * Rol = Coordinador - Estudiante
         * 
         * Permiso padre = Servicio social
         */

        $perServ = new Permiso();
        $perServ->nombre = 'Servicio social';
        $perServ->name = 'Social service';
        $perServ->icon = 'walk';
        $perServ->estado = 'Activo';
        $perServ->save();

        /* Permisos hijo */
        $perZS = new Permiso();
        $perZS->nombre = "Zonas de servicio";
        $perZS->name = "Service areas";
        $perZS->url = $home.'zonas/index';
        $perZS->permiso_padre = $perServ->id;
        $perZS->estado = 'Activo';
        $perZS->save();

        $perBS = new Permiso();
        $perBS->nombre = "Bitácoras de servicio";
        $perBS->name = "Service logs";
        $perBS->url = $home.'bitacora/index';
        $perBS->permiso_padre = $perServ->id;
        $perBS->estado = 'Activo';
        $perBS->save();

        /**
         * Permisos de control de PQRS
         * Rol = Coordinador - Acudiente
         * 
         * Permiso padre = PQRS
         */

        $perPqrs = new Permiso();
        $perPqrs->nombre = 'PQRS';
        $perPqrs->name = 'Consultations';
        $perPqrs->icon = 'help';
        $perPqrs->estado = 'Activo';
        $perPqrs->save();

        /* Permisos hijo */
        $perLP = new Permiso();
        $perLP->nombre = "Lista de PQRS";
        $perLP->name = "List of queries";
        $perLP->url = $home.'pqrs/index';
        $perLP->permiso_padre = $perPqrs->id;
        $perLP->estado = 'Activo';
        $perLP->save();

        $perMP = new Permiso();
        $perMP->nombre = "Mis PQRS";
        $perMP->name = "My questions";
        $perMP->url = $home.'pqrs/create';
        $perMP->permiso_padre = $perPqrs->id;
        $perMP->estado = 'Activo';
        $perMP->save();

        /**
         * Permisos de control de Citas
         * Rol = Coordinador - Acudiente
         * 
         * Permiso padre = Citas
         */

        $perCit = new Permiso();
        $perCit->nombre = 'Citas';
        $perCit->name = 'Appointment';
        $perCit->icon = 'calendar-outline';
        $perCit->estado = 'Activo';
        $perCit->save();

        /* Permisos hijo */
        $perRC = new Permiso();
        $perRC->nombre = "Registrar cita";
        $perRC->name = "Register appointment";
        $perRC->url = $url;
        $perRC->permiso_padre = $perCit->id;
        $perRC->estado = 'Activo';
        $perRC->save();
      
        $perCC = new Permiso();
        $perCC->nombre = "Consultar citas";
        $perCC->name = "Consult appointments";
        $perCC->url = $home.'citas/index';
        $perCC->permiso_padre = $perCit->id;
        $perCC->estado = 'Activo';
        $perCC->save();

        /**
         * Permisos de control de Administración academica
         * Rol = Coordinador
         * 
         * Permiso padre = Administración academica
         */

        $perAA = new Permiso();
        $perAA->nombre = 'Administración académica';
        $perAA->name = 'Academic administration';
        $perAA->icon = 'school';
        $perAA->estado = 'Activo';
        $perAA->save();

        /* Permisos hijo */
        $perIG = new Permiso();
        $perIG->nombre = "Información general";
        $perIG->name = "General information";
        $perIG->url = $home.'administracion_academica/index';
        $perIG->permiso_padre = $perAA->id;
        $perIG->estado = 'Activo';
        $perIG->save();

        $perCur = new Permiso();
        $perCur->nombre = "Docentes";
        $perCur->name = "Teachers";
        $perCur->url = $url;
        $perCur->permiso_padre = $perAA->id;
        $perCur->estado = 'Activo';
        $perCur->save();
        
        $perHorC = new Permiso();
        $perHorC->nombre = "Administrar horarios";
        $perHorC->name = "Manage schedules";
        $perHorC->url = $url;
        $perHorC->permiso_padre = $perAA->id;
        $perHorC->estado = 'Activo';
        $perHorC->save();
        
        /**
         * Permisos de control de Noticias
         * Rol = Coordinador
         * 
         * Permiso padre = Noticias
         */

        $perNot = new Permiso();
        $perNot->nombre = 'Noticias';
        $perNot->name = 'News';
        $perNot->icon = 'newspaper';
        $perNot->estado = 'Activo';
        $perNot->save();

        /* Permisos hijo */      
        $perCN = new Permiso();
        $perCN->nombre = "Lista de noticias";
        $perCN->name = "News list";
        $perCN->url = 'http://mariacanoied.herokuapp.com/pages/news/index';
        $perCN->permiso_padre = $perNot->id;
        $perCN->estado = 'Activo';
        $perCN->save();
        
        /**
         * Permisos de control de Portafolio
         * Rol = Docente
         * 
         * Permiso padre = Portafolio
         */

        $perPor = new Permiso();
        $perPor->nombre = 'Portafolio';
        $perPor->name = 'Briefcase';
        $perPor->icon = 'briefcase';
        $perPor->estado = 'Activo';
        $perPor->save();
        
        /* Permisos hijo */
        $perAct = new Permiso();
        $perAct->nombre = "Actividades";
        $perAct->name = "Activities";
        $perAct->url = $home.'actividades/index';
        $perAct->permiso_padre = $perPor->id;
        $perAct->estado = 'Activo';
        $perAct->save();
        
        /**
         * Permisos de control de Agenda
         * Rol = Docente - Acudiente - Estudiante
         * 
         * Permiso padre = Agenda
         */

        $perAge = new Permiso();
        $perAge->nombre = 'Agenda';
        $perAge->name = 'Schedule';
        $perAge->icon = 'book';
        $perAge->estado = 'Activo';
        $perAge->save();

        /* Permisos hijo */
        $perRO = new Permiso();
        $perRO->nombre = "Registrar observación";
        $perRO->name = "Record observation";
        $perRO->url = $home.'agendaWeb/create';
        $perRO->permiso_padre = $perAge->id;
        $perRO->estado = 'Activo';
        $perRO->save();
        
        $perCO = new Permiso();
        $perCO->nombre = "Consultar observaciones";
        $perCO->name = "Consult observations";
        $perCO->url = $home.'agendaWeb/index';
        $perCO->permiso_padre = $perAge->id;
        $perCO->estado = 'Activo';
        $perCO->save();
        
        /**
         * Permisos de control de Planillas
         * Rol = Docente
         * 
         * Permiso padre = Planillas
         */

        $perPla = new Permiso();
        $perPla->nombre = 'Registros académicos';
        $perPla->name = 'Academic Records';
        $perPla->icon = 'clipboard';
        $perPla->estado = 'Activo';
        $perPla->save();
        /* Permisos hijo */
        $perCal = new Permiso();
        $perCal->nombre = "Calificaciones";
        $perCal->name = "Ratings";
        $perCal->url = $home.'notas/index';
        $perCal->permiso_padre = $perPla->id;
        $perCal->estado = 'Activo';
        $perCal->save();
        
        $perAsis = new Permiso();
        $perAsis->nombre = "Asistencia";
        $perAsis->name = "Assistance";
        $perAsis->url = $home.'asistencias/index';
        $perAsis->permiso_padre = $perPla->id;
        $perAsis->estado = 'Activo';
        $perAsis->save();
    }
}
