<body role="document">

<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="inicio.php">Home</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Alumnos<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="TestAlumno.php">CRUD</a></li>

                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Maestros<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="TestMaestro.php">CRUD</a></li>
                        <li><a href="TestMateria.php">Asignar Materia</a></li>
                        <li><a href="TestGrupo.php">Asignar Grupo</a></li>
                    </ul>
                </li>
                <li class=""><a href="logout.php">Salir</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
</body>
<?php
?>