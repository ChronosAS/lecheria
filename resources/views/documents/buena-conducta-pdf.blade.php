<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title>Registro Civil | Buena Conducta</title>
        <link rel="stylesheet" href="{{ asset('css/Documents/pdf.css') }}" />
    </head>
    <body>
        <div id="header">
            <h2>
                REPÚBLICA BOLIVARIANA DE VENEZUELA <br>
                ESTADO ANZOÁTEGUI <br>
                ALCALDÍA DEL MUNICIPIO TURÍSTICO EL MORRO<br>
                LCDO. DIEGO BAUTISTA URBANEJA
            </h2>
            <p style="text-align: right">Código: 202304030304</p>
        </div>
        <h1 class="title">
            CONSTANCIA DE BUENA CONDUCTA
        </h1>
        <p class="p1">
            El Suscrito, ABG. <b>DENISSE HERNANDEZ URBANEJA</b>, Registradora Civil de la Alcaldía del Municipio Turístico El Morro, Lic. DiegoBautista Urbaneja del Estado Anzoátegui,según Resolución Nº 180/2017, publicada en Gaceta Nº 032/2017,de la República Bolivariana de Venezuela, Hago constar que hoy se presentó ante esta Despacho, el ciudadano/a: {{-- $citizen_name --}} Estado Civil {{-- $civil_state --}} , de <b>{{ $citizen_age }}</b> años de edad, Nacionalidad:{{-- -$nationality --}}y Titular de la C.I. Nº: {{-- $citizen_id --}}, domiciliado/a en {{-- $citizen_address --}} <b>Lechería, Estado Anzoátegui</b>.
        </p>
        <p class="p2">
            En este mismo acto fueron consignados los documentos siguientes:
        </p>
        <p class="p3">
            (Solo para ser llenado por el registrador)
        </p>
        <h2>
            Obligatorio
        </h2>
        <table>
            <tr>
                <td class="td1"></td>
                <td class="td2">
                    <p class="p-table">
                        Fotocopia de la cédula de identidad
                    </p>
                </td>
            </tr>
            <tr>
                <td class="td1"></td>
                <td class="td2">
                    <p class="p-table">
                        Constancia emitida por la policía de no poseer
                        antecedentes penales
                    </p>
                </td>
            </tr>
        </table>
        <h2>
            Obligatorio uno de los siguientes:
        </h2>
        <table>
            <tr>
                <td class="td1"></td>
                <td class="td2">
                    <p class="p-table">
                        Fotocopia del Registro de Información Fiscal(RIF) Vigente
                    </p>
                </td>
            </tr>
        </table>
        <p
            class="s7"
            style="
                padding-left: 134pt;
                text-indent: -127pt;
                line-height: 81%;
                text-align: left;
            "
        >
            El solicitante declara que los datos que anteceden son ciertos y que
            está en conocimiento de las sanciones establecidas en los Artículos
            321 del Código Penal Vigente y 55 de la Ley sobre Simplificación de
            Trámites Administrativos Vigente.
        </p>
        <p style="padding-left: 5pt; text-indent: 0pt; text-align: left">
            La presente Constancia tiene validez para acreditar su estado de
            <b>Conducta Intachable</b>, doy fe del ciudadano identificado, por
            ante todos los órganos, entes o instituciones públicas o privadas.
        </p>
        <p style="padding-left: 5pt; text-indent: 0pt; text-align: left">
            En Lechería, a los 03 días del mes Abril de 2023.
        </p>
        <p
            class="s8"
            style="padding-left: 24pt; text-indent: 0pt; text-align: left"
        >
            <span /> <span />
        </p>
        <h3 style="padding-left: 94pt; text-indent: 0pt; text-align: left">
            Gabriel Gomez
        </h3>
        <h3 style="padding-left: 97pt; text-indent: 0pt; text-align: left">
            C.I: 18299360 Huellas dactilares
        </h3>
        <p
            class="s9"
            style="padding-left: 32pt; text-indent: 0pt; text-align: center"
        >
            ABG. DENISSE HERNANDEZ URBANEJA
        </p>
        <p
            class="s9"
            style="padding-left: 31pt; text-indent: 0pt; text-align: center"
        >
            Registrador Civil
        </p>
        <p
            class="s10"
            style="padding-left: 31pt; text-indent: 0pt; text-align: center"
        >
            Según resolución Nro.180 de fecha 22/12/2017
        </p>
        <h3 style="padding-left: 32pt; text-indent: 0pt; text-align: center">
            LA EXPEDICIÓN DE LA PRESENTE CONSTANCIA ES COMPLETAMENTE GRATUITA
        </h3>
    </body>
</html>
