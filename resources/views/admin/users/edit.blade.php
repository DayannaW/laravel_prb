@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASIGNAR ROLES</title>
</head>

<body>
    <div class="text-center">
        <h1>ASIGNAR ROLES</h1>
    </div>
    <div class="row justify-content-center mb-3 mx-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nombre</h5>
                <p class="form-control">{{$usuario->name}}</p>

                <form action="{{route('admin.user.update')}}" method="match">
                @foreach ($roles as $role)
                    <div class="form-check">
                    <input type="hidden" value="{{$usuario->id}}" name="usuario" id="usuario">

                        <input class="form-check-input" type="checkbox" value="{{$role->id}}" name="roles" id="roles" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            {{$role->name}}
                        </label>
                       
                    </div>
                    @endforeach
                    <button class="btn btn-primary" type="submit"> Guardar </button>
                </form>

            </div>
        </div>

    </div>
    <script src="js/app.js"> </script>
</body>

</html>
@endsection


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table 'actividades'
--

DROP TABLE IF EXISTS 'actividades';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'actividades' (
  'id' bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  'nombreCargo' varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  'created_at' timestamp NULL DEFAULT NULL,
  'updated_at' timestamp NULL DEFAULT NULL,
  PRIMARY KEY ('id')
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'actividades'
--

LOCK TABLES 'actividades' WRITE;
/*!40000 ALTER TABLE 'actividades' DISABLE KEYS */;
INSERT INTO 'actividades' VALUES (1,'mercaderista','2022-05-26 02:03:29','2022-05-26 02:03:29'),(2,'impulsador','2022-05-26 02:03:29','2022-05-26 02:03:29'),(3,'controlador','2022-05-26 02:03:29','2022-05-26 02:03:29'),(4,'analista','2022-05-26 02:03:29','2022-05-26 02:03:29');
/*!40000 ALTER TABLE 'actividades' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'cuentas'
--

DROP TABLE IF EXISTS 'cuentas';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'cuentas' (
  'id' bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  'nombreCuenta' varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  'empresaResponsable_id' bigint(20) unsigned DEFAULT NULL,
  'created_at' timestamp NULL DEFAULT NULL,
  'updated_at' timestamp NULL DEFAULT NULL,
  PRIMARY KEY ('id'),
  KEY 'cuentas_empresaresponsable_id_foreign' ('empresaResponsable_id'),
  CONSTRAINT 'cuentas_empresaresponsable_id_foreign' FOREIGN KEY ('empresaResponsable_id') REFERENCES 'empresas' ('id') ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'cuentas'
--

LOCK TABLES 'cuentas' WRITE;
/*!40000 ALTER TABLE 'cuentas' DISABLE KEYS */;
INSERT INTO 'cuentas' VALUES (1,'Alicorp',1,'2022-05-26 02:03:29','2022-05-26 02:03:29'),(2,'Sony',2,'2022-05-26 02:03:29','2022-05-26 02:03:29'),(3,'Colgate',2,'2022-05-26 02:03:29','2022-05-26 02:03:29'),(4,'Samsung',1,'2022-05-26 02:03:29','2022-05-26 02:03:29');
/*!40000 ALTER TABLE 'cuentas' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'empresas'
--

DROP TABLE IF EXISTS 'empresas';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'empresas' (
  'id' bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  'nombreEmpresa' varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  'created_at' timestamp NULL DEFAULT NULL,
  'updated_at' timestamp NULL DEFAULT NULL,
  PRIMARY KEY ('id')
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'empresas'
--

LOCK TABLES 'empresas' WRITE;
/*!40000 ALTER TABLE 'empresas' DISABLE KEYS */;
INSERT INTO 'empresas' VALUES (1,'Lucky','2022-05-26 02:03:29','2022-05-26 02:03:29'),(2,'Boom','2022-05-26 02:03:29','2022-05-26 02:03:29');
/*!40000 ALTER TABLE 'empresas' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'failed_jobs'
--

DROP TABLE IF EXISTS 'failed_jobs';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'failed_jobs' (
  'id' bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  'uuid' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'connection' text COLLATE utf8mb4_unicode_ci NOT NULL,
  'queue' text COLLATE utf8mb4_unicode_ci NOT NULL,
  'payload' longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  'exception' longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  'failed_at' timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY ('id'),
  UNIQUE KEY 'failed_jobs_uuid_unique' ('uuid')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'failed_jobs'
--

LOCK TABLES 'failed_jobs' WRITE;
/*!40000 ALTER TABLE 'failed_jobs' DISABLE KEYS */;
/*!40000 ALTER TABLE 'failed_jobs' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'lineas'
--

DROP TABLE IF EXISTS 'lineas';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'lineas' (
  'id' bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  'numeroLinea' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'operadora' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'empresaInterna_id' bigint(20) unsigned DEFAULT NULL,
  'planilla' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'plan' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'observacion' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'valor' int(11) NOT NULL,
  'nombres_usuario' varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  'apellidos_usuario' varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  'cuenta' varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  'actividad' varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  'responsable' varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  'presupuesto' varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  'created_at' timestamp NULL DEFAULT NULL,
  'updated_at' timestamp NULL DEFAULT NULL,
  PRIMARY KEY ('id'),
  KEY 'lineas_empresainterna_id_foreign' ('empresaInterna_id'),
  CONSTRAINT 'lineas_empresainterna_id_foreign' FOREIGN KEY ('empresaInterna_id') REFERENCES 'empresas' ('id') ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'lineas'
--

LOCK TABLES 'lineas' WRITE;
/*!40000 ALTER TABLE 'lineas' DISABLE KEYS */;
INSERT INTO 'lineas' VALUES (1,'0952258825','movistar',1,'15.25563','20','llamadas ilimitadas',15,'Juan','Peres','3','4','Mario Muñoz','20','2022-05-26 02:05:47','2022-05-26 02:49:31'),(2,'0988452114','movistar',1,'15.25563','20','llamadas ilimitadas',15,NULL,NULL,NULL,NULL,NULL,'20','2022-05-26 02:05:47','2022-05-26 02:05:47'),(3,'0982076583','movistar',1,'15.25563','20','llamadas ilimitadas',15,'Raul','Castro','2','1','Paul Sanchez','20','2022-05-26 02:05:47','2022-05-26 02:14:05'),(4,'0952258877','movistar',1,'15.25563','20','llamadas ilimitadas',15,NULL,NULL,NULL,NULL,NULL,'20','2022-05-26 02:05:47','2022-05-26 02:05:47'),(5,'0955441238','claro',2,'15.25557','25','claro video',31,'Mayra','Moreira','2','1','Luis Lopez','35','2022-05-26 02:13:41','2022-05-26 02:14:16'),(6,'0385274144','claro',2,'15.25557','25','claro video',31,NULL,NULL,NULL,NULL,NULL,'35','2022-05-26 02:13:41','2022-05-26 02:13:41'),(7,'0984174173','claro',2,'15.25557','25','claro video',31,NULL,NULL,NULL,NULL,NULL,'35','2022-05-26 02:13:41','2022-05-26 02:13:41'),(8,'0965321875','claro',2,'15.25557','25','claro video',31,NULL,NULL,NULL,NULL,NULL,'35','2022-05-26 02:13:41','2022-05-26 02:13:41'),(9,'0963527415','cnt',1,'15.25567','15','llamadas ilimitadas',24,NULL,NULL,NULL,NULL,NULL,'25','2022-05-26 02:18:42','2022-05-26 02:18:42'),(10,'0968524163','cnt',1,'15.25567','15','llamadas ilimitadas',24,NULL,NULL,NULL,NULL,NULL,'25','2022-05-26 02:18:42','2022-05-26 02:18:42'),(11,'0974152633','movistar',2,'15.25567','25','llamadas ilimitadas',36,NULL,NULL,NULL,NULL,NULL,'40','2022-05-26 02:43:51','2022-05-26 02:43:51'),(12,'2114152525','movistar',2,'15.25567','25','llamadas ilimitadas',36,NULL,NULL,NULL,NULL,NULL,'40','2022-05-26 02:43:51','2022-05-26 02:43:51'),(13,'2025252522','movistar',2,'15.25567','25','llamadas ilimitadas',36,NULL,NULL,NULL,NULL,NULL,'40','2022-05-26 02:43:51','2022-05-26 02:43:51'),(14,'5222258855','movistar',2,'15.25567','25','llamadas ilimitadas',36,NULL,NULL,NULL,NULL,NULL,'40','2022-05-26 02:43:51','2022-05-26 02:43:51'),(15,'6685255522','movistar',2,'15.25567','25','llamadas ilimitadas',36,NULL,NULL,NULL,NULL,NULL,'40','2022-05-26 02:43:51','2022-05-26 02:43:51');
/*!40000 ALTER TABLE 'lineas' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'migrations'
--

DROP TABLE IF EXISTS 'migrations';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'migrations' (
  'id' int(10) unsigned NOT NULL AUTO_INCREMENT,
  'migration' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'batch' int(11) NOT NULL,
  PRIMARY KEY ('id')
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'migrations'
--

LOCK TABLES 'migrations' WRITE;
/*!40000 ALTER TABLE 'migrations' DISABLE KEYS */;
INSERT INTO 'migrations' VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_05_09_162723_create_empresas_table',1),(6,'2022_05_09_165317_create_cuentas_table',1),(7,'2022_05_09_170523_create_actividades_table',1),(8,'2022_05_09_171154_create_lineas_table',1),(9,'2022_05_09_192332_create_usuarios_table',1),(10,'2022_05_09_212913_create_reposicions_table',1),(11,'2022_05_09_212934_create_reasignacions_table',1),(12,'2022_05_19_141348_create_permission_tables',1);
/*!40000 ALTER TABLE 'migrations' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'model_has_permissions'
--

DROP TABLE IF EXISTS 'model_has_permissions';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'model_has_permissions' (
  'permission_id' bigint(20) unsigned NOT NULL,
  'model_type' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'model_id' bigint(20) unsigned NOT NULL,
  PRIMARY KEY ('permission_id','model_id','model_type'),
  KEY 'model_has_permissions_model_id_model_type_index' ('model_id','model_type'),
  CONSTRAINT 'model_has_permissions_permission_id_foreign' FOREIGN KEY ('permission_id') REFERENCES 'permissions' ('id') ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'model_has_permissions'
--

LOCK TABLES 'model_has_permissions' WRITE;
/*!40000 ALTER TABLE 'model_has_permissions' DISABLE KEYS */;
/*!40000 ALTER TABLE 'model_has_permissions' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'model_has_roles'
--

DROP TABLE IF EXISTS 'model_has_roles';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'model_has_roles' (
  'role_id' bigint(20) unsigned NOT NULL,
  'model_type' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'model_id' bigint(20) unsigned NOT NULL,
  PRIMARY KEY ('role_id','model_id','model_type'),
  KEY 'model_has_roles_model_id_model_type_index' ('model_id','model_type'),
  CONSTRAINT 'model_has_roles_role_id_foreign' FOREIGN KEY ('role_id') REFERENCES 'roles' ('id') ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'model_has_roles'
--

LOCK TABLES 'model_has_roles' WRITE;
/*!40000 ALTER TABLE 'model_has_roles' DISABLE KEYS */;
INSERT INTO 'model_has_roles' VALUES (1,'App\\Models\\User',1);
/*!40000 ALTER TABLE 'model_has_roles' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'password_resets'
--

DROP TABLE IF EXISTS 'password_resets';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'password_resets' (
  'email' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'token' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'created_at' timestamp NULL DEFAULT NULL,
  KEY 'password_resets_email_index' ('email')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'password_resets'
--

LOCK TABLES 'password_resets' WRITE;
/*!40000 ALTER TABLE 'password_resets' DISABLE KEYS */;
/*!40000 ALTER TABLE 'password_resets' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'permissions'
--

DROP TABLE IF EXISTS 'permissions';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'permissions' (
  'id' bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  'name' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'guard_name' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'created_at' timestamp NULL DEFAULT NULL,
  'updated_at' timestamp NULL DEFAULT NULL,
  PRIMARY KEY ('id'),
  UNIQUE KEY 'permissions_name_guard_name_unique' ('name','guard_name')
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'permissions'
--

LOCK TABLES 'permissions' WRITE;
/*!40000 ALTER TABLE 'permissions' DISABLE KEYS */;
INSERT INTO 'permissions' VALUES (1,'lineas.index','web','2022-05-26 02:03:29','2022-05-26 02:03:29'),(2,'lineas.create','web','2022-05-26 02:03:29','2022-05-26 02:03:29'),(3,'lineas.store','web','2022-05-26 02:03:29','2022-05-26 02:03:29'),(4,'lineas.edit','web','2022-05-26 02:03:29','2022-05-26 02:03:29'),(5,'lineas.update','web','2022-05-26 02:03:29','2022-05-26 02:03:29'),(6,'usuarios.index','web','2022-05-26 02:03:29','2022-05-26 02:03:29'),(7,'usuarios.create','web','2022-05-26 02:03:29','2022-05-26 02:03:29'),(8,'usuarios.store','web','2022-05-26 02:03:29','2022-05-26 02:03:29'),(9,'usuarios.edit','web','2022-05-26 02:03:29','2022-05-26 02:03:29'),(10,'usuarios.update','web','2022-05-26 02:03:29','2022-05-26 02:03:29'),(11,'usuarios.crear','web','2022-05-26 02:03:29','2022-05-26 02:03:29'),(12,'usuarios.guardar','web','2022-05-26 02:03:29','2022-05-26 02:03:29');
/*!40000 ALTER TABLE 'permissions' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'personal_access_tokens'
--

DROP TABLE IF EXISTS 'personal_access_tokens';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'personal_access_tokens' (
  'id' bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  'tokenable_type' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'tokenable_id' bigint(20) unsigned NOT NULL,
  'name' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'token' varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  'abilities' text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  'last_used_at' timestamp NULL DEFAULT NULL,
  'created_at' timestamp NULL DEFAULT NULL,
  'updated_at' timestamp NULL DEFAULT NULL,
  PRIMARY KEY ('id'),
  UNIQUE KEY 'personal_access_tokens_token_unique' ('token'),
  KEY 'personal_access_tokens_tokenable_type_tokenable_id_index' ('tokenable_type','tokenable_id')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'personal_access_tokens'
--

LOCK TABLES 'personal_access_tokens' WRITE;
/*!40000 ALTER TABLE 'personal_access_tokens' DISABLE KEYS */;
/*!40000 ALTER TABLE 'personal_access_tokens' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'reasignacions'
--

DROP TABLE IF EXISTS 'reasignacions';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'reasignacions' (
  'id' bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  'numeroLinea_id' bigint(20) unsigned DEFAULT NULL,
  'usuario_actual' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'usuario_nuevo_id' bigint(20) unsigned DEFAULT NULL,
  'created_at' timestamp NULL DEFAULT NULL,
  'updated_at' timestamp NULL DEFAULT NULL,
  PRIMARY KEY ('id'),
  KEY 'reasignacions_numerolinea_id_foreign' ('numeroLinea_id'),
  KEY 'reasignacions_usuario_nuevo_id_foreign' ('usuario_nuevo_id'),
  CONSTRAINT 'reasignacions_numerolinea_id_foreign' FOREIGN KEY ('numeroLinea_id') REFERENCES 'lineas' ('id') ON DELETE SET NULL,
  CONSTRAINT 'reasignacions_usuario_nuevo_id_foreign' FOREIGN KEY ('usuario_nuevo_id') REFERENCES 'usuarios' ('id') ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'reasignacions'
--

LOCK TABLES 'reasignacions' WRITE;
/*!40000 ALTER TABLE 'reasignacions' DISABLE KEYS */;
/*!40000 ALTER TABLE 'reasignacions' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'reposicions'
--

DROP TABLE IF EXISTS 'reposicions';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'reposicions' (
  'id' bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  'numeroLinea_id' bigint(20) unsigned DEFAULT NULL,
  'usuario_id' bigint(20) unsigned DEFAULT NULL,
  'created_at' timestamp NULL DEFAULT NULL,
  'updated_at' timestamp NULL DEFAULT NULL,
  PRIMARY KEY ('id'),
  KEY 'reposicions_numerolinea_id_foreign' ('numeroLinea_id'),
  KEY 'reposicions_usuario_id_foreign' ('usuario_id'),
  CONSTRAINT 'reposicions_numerolinea_id_foreign' FOREIGN KEY ('numeroLinea_id') REFERENCES 'lineas' ('id') ON DELETE SET NULL,
  CONSTRAINT 'reposicions_usuario_id_foreign' FOREIGN KEY ('usuario_id') REFERENCES 'usuarios' ('id') ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'reposicions'
--

LOCK TABLES 'reposicions' WRITE;
/*!40000 ALTER TABLE 'reposicions' DISABLE KEYS */;
/*!40000 ALTER TABLE 'reposicions' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'role_has_permissions'
--

DROP TABLE IF EXISTS 'role_has_permissions';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'role_has_permissions' (
  'permission_id' bigint(20) unsigned NOT NULL,
  'role_id' bigint(20) unsigned NOT NULL,
  PRIMARY KEY ('permission_id','role_id'),
  KEY 'role_has_permissions_role_id_foreign' ('role_id'),
  CONSTRAINT 'role_has_permissions_permission_id_foreign' FOREIGN KEY ('permission_id') REFERENCES 'permissions' ('id') ON DELETE CASCADE,
  CONSTRAINT 'role_has_permissions_role_id_foreign' FOREIGN KEY ('role_id') REFERENCES 'roles' ('id') ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'role_has_permissions'
--

LOCK TABLES 'role_has_permissions' WRITE;
/*!40000 ALTER TABLE 'role_has_permissions' DISABLE KEYS */;
INSERT INTO 'role_has_permissions' VALUES (1,1),(1,2),(2,1),(3,1),(4,1),(5,1),(6,1),(6,2),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1);
/*!40000 ALTER TABLE 'role_has_permissions' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'roles'
--

DROP TABLE IF EXISTS 'roles';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'roles' (
  'id' bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  'name' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'guard_name' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'created_at' timestamp NULL DEFAULT NULL,
  'updated_at' timestamp NULL DEFAULT NULL,
  PRIMARY KEY ('id'),
  UNIQUE KEY 'roles_name_guard_name_unique' ('name','guard_name')
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'roles'
--

LOCK TABLES 'roles' WRITE;
/*!40000 ALTER TABLE 'roles' DISABLE KEYS */;
INSERT INTO 'roles' VALUES (1,'administrador','web','2022-05-26 02:03:29','2022-05-26 02:03:29'),(2,'empleado','web','2022-05-26 02:03:29','2022-05-26 02:03:29');
/*!40000 ALTER TABLE 'roles' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'users'
--

DROP TABLE IF EXISTS 'users';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'users' (
  'id' bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  'name' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'email' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'email_verified_at' timestamp NULL DEFAULT NULL,
  'password' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'remember_token' varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  'created_at' timestamp NULL DEFAULT NULL,
  'updated_at' timestamp NULL DEFAULT NULL,
  PRIMARY KEY ('id'),
  UNIQUE KEY 'users_email_unique' ('email')
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'users'
--

LOCK TABLES 'users' WRITE;
/*!40000 ALTER TABLE 'users' DISABLE KEYS */;
INSERT INTO 'users' VALUES (1,'Victor Arana','victor@gmail.com',NULL,'$2y$10$oOpBdK6yCj7/KJTBw64iq.1O0RbEYWSQFJQf1CXQTYlzSrJ2fveau',NULL,'2022-05-26 02:03:29','2022-05-26 02:03:29');
/*!40000 ALTER TABLE 'users' ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table 'usuarios'
--

DROP TABLE IF EXISTS 'usuarios';
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE 'usuarios' (
  'id' bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  'cedula' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'nombres' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'apellidos' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'cuenta' bigint(20) unsigned DEFAULT NULL,
  'actividad' bigint(20) unsigned DEFAULT NULL,
  'numeroLinea' bigint(20) unsigned DEFAULT NULL,
  'responsable' varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  'created_at' timestamp NULL DEFAULT NULL,
  'updated_at' timestamp NULL DEFAULT NULL,
  PRIMARY KEY ('id'),
  KEY 'usuarios_cuenta_foreign' ('cuenta'),
  KEY 'usuarios_actividad_foreign' ('actividad'),
  KEY 'usuarios_numerolinea_foreign' ('numeroLinea'),
  CONSTRAINT 'usuarios_actividad_foreign' FOREIGN KEY ('actividad') REFERENCES 'actividades' ('id') ON DELETE SET NULL,
  CONSTRAINT 'usuarios_cuenta_foreign' FOREIGN KEY ('cuenta') REFERENCES 'cuentas' ('id') ON DELETE SET NULL,
  CONSTRAINT 'usuarios_numerolinea_foreign' FOREIGN KEY ('numeroLinea') REFERENCES 'lineas' ('id') ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table 'usuarios'
--

LOCK TABLES 'usuarios' WRITE;
/*!40000 ALTER TABLE 'usuarios' DISABLE KEYS */;
INSERT INTO 'usuarios' VALUES (1,'0955544852','Mayra','Moreira',2,1,5,'Luis Lopez','2022-05-26 02:08:31','2022-05-26 02:14:16'),(2,'1302258525','Juan','Peres',3,4,1,'Mario Muñoz','2022-05-26 02:09:10','2022-05-26 02:49:31'),(3,'0984556322','Raul','Castro',2,1,3,'Paul Sanchez','2022-05-26 02:10:02','2022-05-26 02:14:05'),(4,'1352474558','Viviana','Torres',3,2,NULL,'Pablo Ruiz','2022-05-26 02:26:38','2022-05-26 02:49:31');
/*!40000 ALTER TABLE 'usuarios' ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-27  9:21:15
