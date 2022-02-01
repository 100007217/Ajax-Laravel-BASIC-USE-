<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD AJAX</title>
    <script src="js/ajax.js"></script>
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <style>
        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
        }
    </style>
</head>
<body>
    <input type="text" onkeyup="leerJS()" id="filtro">
    <hr>
    <table id="main">
    </table>
    <hr>
    <form onsubmit="insertarJS(); return false;">
        <input type="text" id="nombre">
        <input type="file" id="foto">
        <input type="submit">
    </form>
    <hr>
    <p id="mensaje"></p>
    <hr>
    <div id="myModal" class="modal">

    <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="" onsubmit="editarJS(); return false;">
                <span>Nombre</span>
                <input type="hidden" name="id" id="id_mod">
                <input type="text" name="nombre" id="nombre_mod">
                <input type="hidden" name="foto" id="foto_mod">
                <input type="file" name="foto_file" id="foto_mod_file">
                <input type="submit" value="Modificar">
            </form>
        </div>
    </div>

    </div>
</body>
<script src="js/ajax.js"></script>
</html>