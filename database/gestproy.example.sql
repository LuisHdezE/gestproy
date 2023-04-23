/*
 Navicat Premium Data Transfer

 Source Server         : Postgres
 Source Server Type    : PostgreSQL
 Source Server Version : 90302
 Source Host           : localhost:5432
 Source Catalog        : gestproy
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 90302
 File Encoding         : 65001

 Date: 10/05/2019 09:13:30
*/


-- ----------------------------
-- Sequence structure for categorias_codigo_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."categorias_codigo_seq";
CREATE SEQUENCE "public"."categorias_codigo_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for etapa_presup_prov_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."etapa_presup_prov_id_seq";
CREATE SEQUENCE "public"."etapa_presup_prov_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for etapas_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."etapas_id_seq";
CREATE SEQUENCE "public"."etapas_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for experimentos_vigentes_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."experimentos_vigentes_id_seq";
CREATE SEQUENCE "public"."experimentos_vigentes_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for gastos_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."gastos_id_seq";
CREATE SEQUENCE "public"."gastos_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for materiales_plan_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."materiales_plan_id_seq";
CREATE SEQUENCE "public"."materiales_plan_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for otros_gastos_plan_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."otros_gastos_plan_id_seq";
CREATE SEQUENCE "public"."otros_gastos_plan_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for personal_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."personal_id_seq";
CREATE SEQUENCE "public"."personal_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for personal_proy_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."personal_proy_id_seq";
CREATE SEQUENCE "public"."personal_proy_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for phpgen_users_user_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."phpgen_users_user_id_seq";
CREATE SEQUENCE "public"."phpgen_users_user_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for proyectos_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."proyectos_id_seq";
CREATE SEQUENCE "public"."proyectos_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for prueba_json_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."prueba_json_id_seq";
CREATE SEQUENCE "public"."prueba_json_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for reportes_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."reportes_id_seq";
CREATE SEQUENCE "public"."reportes_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for resultado_etapa_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."resultado_etapa_id_seq";
CREATE SEQUENCE "public"."resultado_etapa_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for resultados_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."resultados_id_seq";
CREATE SEQUENCE "public"."resultados_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tareas_part_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tareas_part_id_seq";
CREATE SEQUENCE "public"."tareas_part_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tareas_part_id_user_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tareas_part_id_user_seq";
CREATE SEQUENCE "public"."tareas_part_id_user_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for tipos_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."tipos_id_seq";
CREATE SEQUENCE "public"."tipos_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for areas
-- ----------------------------
DROP TABLE IF EXISTS "public"."areas";
CREATE TABLE "public"."areas" (
  "codigo" varchar(4) COLLATE "pg_catalog"."default" NOT NULL,
  "nombre" varchar(40) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of areas
-- ----------------------------
INSERT INTO "public"."areas" VALUES ('002', 'Protección de Plantas');
INSERT INTO "public"."areas" VALUES ('003', 'Suelos y Agroquímica');
INSERT INTO "public"."areas" VALUES ('004', 'Agronomía');
INSERT INTO "public"."areas" VALUES ('005', 'Tecnologia Agrícola');
INSERT INTO "public"."areas" VALUES ('001', 'Genética');

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS "public"."categorias";
CREATE TABLE "public"."categorias" (
  "nombre" varchar(30) COLLATE "pg_catalog"."default",
  "codigo" int2 NOT NULL DEFAULT nextval('categorias_codigo_seq'::regclass)
)
;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO "public"."categorias" VALUES ('Inv. Titular', 1);
INSERT INTO "public"."categorias" VALUES ('Especialista ', 5);
INSERT INTO "public"."categorias" VALUES ('Auxiliar de Inv.', 9);
INSERT INTO "public"."categorias" VALUES ('Inv. Auxiliar', 2);
INSERT INTO "public"."categorias" VALUES ('Inv. Agregado', 3);
INSERT INTO "public"."categorias" VALUES ('Aspirante Inv.', 4);

-- ----------------------------
-- Table structure for cepa
-- ----------------------------
DROP TABLE IF EXISTS "public"."cepa";
CREATE TABLE "public"."cepa" (
  "codigo" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "descripcio" varchar(20) COLLATE "pg_catalog"."default",
  "nombrecorto" varchar(5) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of cepa
-- ----------------------------
INSERT INTO "public"."cepa" VALUES ('1', 'Primavera Quedada', 'PQ');
INSERT INTO "public"."cepa" VALUES ('2', 'Retoño Quedado', 'RQ');
INSERT INTO "public"."cepa" VALUES ('3', 'Soca', 'S');
INSERT INTO "public"."cepa" VALUES ('4', 'Retoño', 'R');
INSERT INTO "public"."cepa" VALUES ('5', 'Fríos', 'F');
INSERT INTO "public"."cepa" VALUES ('6', 'Primavera', 'P');
INSERT INTO "public"."cepa" VALUES ('7', 'Siembra de Frío', 'SF');
INSERT INTO "public"."cepa" VALUES ('8', 'Siembra de Primavera', 'SP');

-- ----------------------------
-- Table structure for codmateriales
-- ----------------------------
DROP TABLE IF EXISTS "public"."codmateriales";
CREATE TABLE "public"."codmateriales" (
  "id" int4 NOT NULL,
  "codigo" varchar(11) COLLATE "pg_catalog"."default",
  "tipo" varchar(15) COLLATE "pg_catalog"."default",
  "descripcion" varchar(100) COLLATE "pg_catalog"."default",
  "um" varchar(2) COLLATE "pg_catalog"."default",
  "precio_cup" float4,
  "precio_cuc" float4
)
;

-- ----------------------------
-- Records of codmateriales
-- ----------------------------
INSERT INTO "public"."codmateriales" VALUES (2, '333', 'Equipos', 'PH METRO DIGITAL MANUAL', 'U', 807.01, 140);
INSERT INTO "public"."codmateriales" VALUES (3, NULL, 'Equipos', 'HIDROTERMOGRAFO', 'U', 85, 425);
INSERT INTO "public"."codmateriales" VALUES (4, '', 'Equipos', 'BALANZA TECNICA DIGITAL 0,1g', 'U', 2717.99, 2717.99);
INSERT INTO "public"."codmateriales" VALUES (5, NULL, 'Equipos', 'LIMPIADOR DE SEMILLA', 'U', 1225.33, 1225.33);
INSERT INTO "public"."codmateriales" VALUES (6, NULL, 'Equipos', 'Generador de 2 kw', 'U', 990.41, 990.41);
INSERT INTO "public"."codmateriales" VALUES (7, '0004', 'Equipos', 'Selladora de nailon', 'U', 745, 1490);
INSERT INTO "public"."codmateriales" VALUES (8, NULL, 'Equipos', 'Archivos met�licos con 4 gabetas', 'U', 105, 210);
INSERT INTO "public"."codmateriales" VALUES (9, NULL, 'Equipos', 'Bur� de dos torres y cuatro gabetas', 'U', 88.5, 442.5);
INSERT INTO "public"."codmateriales" VALUES (10, NULL, 'Equipos', 'Mesa para computadora', 'U', 75.5, 151);
INSERT INTO "public"."codmateriales" VALUES (11, NULL, 'Equipos', 'Silla mesa computadora ', 'U', 45, 90);
INSERT INTO "public"."codmateriales" VALUES (12, NULL, 'Equipos', 'MESA DE TRABAJO', 'U', 66.43, 332.15);
INSERT INTO "public"."codmateriales" VALUES (13, NULL, 'Equipos', 'Silla para buro con respaldo', 'U', 45, 225);
INSERT INTO "public"."codmateriales" VALUES (14, NULL, 'Equipos', 'BANQUETAS', 'U', 52, 260);
INSERT INTO "public"."codmateriales" VALUES (15, NULL, 'Equipos', 'ARREGLO DE CAMINO A  BUENOS AIRES', 'KM', 30000, 60000);
INSERT INTO "public"."codmateriales" VALUES (16, NULL, 'Equipos', 'SISTEMA DE RIEGO GOTEO COMPLETO PARA 2 ha', 'U', 6000, 6000);
INSERT INTO "public"."codmateriales" VALUES (17, NULL, 'Equipos', 'MULOS', 'U', 1500, 7500);
INSERT INTO "public"."codmateriales" VALUES (18, NULL, 'Equipos', 'Ab�os para mulos', 'u', NULL, 0);
INSERT INTO "public"."codmateriales" VALUES (19, NULL, 'Equipos', 'CONDUCT�METRO DIGITAL MANUAL', 'U', 471.6, 1414.8);
INSERT INTO "public"."codmateriales" VALUES (20, '', 'Equipos', 'METRO PH DIGITAL', 'U', 645.61, 645.61);
INSERT INTO "public"."codmateriales" VALUES (21, NULL, 'Equipos', 'ELECTRODO DE REPUESTO PARA PH METRO', 'U', 109.417, 109.417);
INSERT INTO "public"."codmateriales" VALUES (22, NULL, 'Equipos', 'BALANZA ANALITICA DIGITAL 0,01g', 'U', 2717.99, 2717.99);
INSERT INTO "public"."codmateriales" VALUES (23, NULL, 'Equipos', 'REFRACTOMETRO DE MANO ', 'U', 160.805, 160.805);
INSERT INTO "public"."codmateriales" VALUES (24, NULL, 'Equipos', 'CABINAS PARA DESPALILLE (1X1X1 M)', 'U', NULL, 0);
INSERT INTO "public"."codmateriales" VALUES (25, NULL, 'Equipos', 'Estante de cinco pisos ', 'u', NULL, 0);
INSERT INTO "public"."codmateriales" VALUES (26, '369', 'Equipos', 'BANQUETA', 'u', 1, 1);
INSERT INTO "public"."codmateriales" VALUES (28, '', 'Equipos', 'Deshumidificador dqo 100 m3, 5 l 50/60hz', 'U', 2030, 2030);
INSERT INTO "public"."codmateriales" VALUES (29, '33', 'Equipos', 'Microscopio óptico', 'U', 1153.31, 5766.55);
INSERT INTO "public"."codmateriales" VALUES (31, '', 'Laboratorio', 'ACIDO FOSFORICO', 'L', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (32, '', 'Laboratorio', 'ACIDO NITRICO', 'L', 31.5, 25.2);
INSERT INTO "public"."codmateriales" VALUES (33, NULL, 'Laboratorio', 'ACIDO SULFÚRICO', 'L', 27.5, 22);
INSERT INTO "public"."codmateriales" VALUES (34, NULL, 'Laboratorio', 'ACIDO SULFURICO REACTIVO', 'L', 28.1379, 22.5103);
INSERT INTO "public"."codmateriales" VALUES (35, NULL, 'Materiales', 'ALAMBRE CON PUAS', 't', 1501.66, 1201.33);
INSERT INTO "public"."codmateriales" VALUES (36, '', 'Materiales', 'ALAMBRE FINO', 'Kg', 1, 0);
INSERT INTO "public"."codmateriales" VALUES (37, NULL, 'Materiales', 'ALAMBRON 5/8''''', 't', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (38, NULL, 'Laboratorio', 'ALCOHOL NATURAL TEC. A', 'HL', 108.125, 86.5);
INSERT INTO "public"."codmateriales" VALUES (39, NULL, 'Laboratorio', 'ALCOHOL MET�LICO', 'L', 0.5, 87.5);
INSERT INTO "public"."codmateriales" VALUES (40, '', 'otros', 'AVIOS PARA BUEYES', 'U', 0.8375, 0.67);
INSERT INTO "public"."codmateriales" VALUES (41, NULL, 'otros', 'Av�os para mulos', 'U', 58, 1.2);
INSERT INTO "public"."codmateriales" VALUES (42, NULL, 'Herramientas', 'AZADAS', 'U', 2.55, 2.04);
INSERT INTO "public"."codmateriales" VALUES (43, NULL, 'Materiales', 'BANDEJA PARA GERMINACI�N (25X14X3CM.)', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (44, NULL, 'Laboratorio', 'BEAKER (100 ML)', 'U', 1.3375, 1.07);
INSERT INTO "public"."codmateriales" VALUES (45, NULL, 'Laboratorio', 'BEAKER (250 ML)', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (46, NULL, 'Laboratorio', 'BEAKER (50 ML)', 'U', 1.3, 1.04);
INSERT INTO "public"."codmateriales" VALUES (47, NULL, 'Oficina', 'Boligrafo desechable pto medio', 'U', 0.3125, 0.25);
INSERT INTO "public"."codmateriales" VALUES (48, NULL, 'Materiales', 'BOLSAS DE TELA PARA COSECHA DE CRUCES', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (49, NULL, 'Materiales', 'Bota especial de zafra (Agr�cola)', 'U', 7.3125, 5.85);
INSERT INTO "public"."codmateriales" VALUES (50, NULL, 'Materiales', 'Bota plastica prod. Nacional 1.', 'U', 8.675, 6.94);
INSERT INTO "public"."codmateriales" VALUES (51, NULL, 'otros', 'Bueyes', 'yu', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (52, NULL, 'Laboratorio', 'BURETAS (50 ML)', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (53, '', 'Laboratorio', 'BURETAS (50 ML)', 'U', 1, 0);
INSERT INTO "public"."codmateriales" VALUES (54, NULL, 'Materiales', 'Camisa', 'U', 6.85, 5.48);
INSERT INTO "public"."codmateriales" VALUES (55, NULL, 'Materiales', 'CANDADOS', 'u', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (56, NULL, 'Materiales', 'CARTUCHOS PARA SEMILLA', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (57, NULL, 'Materiales', 'Cemento gris P-350 ', 'bo', 11.8, 9.44);
INSERT INTO "public"."codmateriales" VALUES (58, '', 'Computo', 'CINTA IMPRESORA (EPSON LX-300+II)', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (59, NULL, 'Computo', 'CINTA METRICA ESMALTADA  50 MTS', 'U', 48.7939, 39.0351);
INSERT INTO "public"."codmateriales" VALUES (60, NULL, 'Materiales', 'CLAVOS PARA HERRAR', 'KG', 32.2625, 25.81);
INSERT INTO "public"."codmateriales" VALUES (61, NULL, 'Materiales', 'CODO 1', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (62, NULL, 'Materiales', 'CODO 1/2', 'U', 0.5, 0);
INSERT INTO "public"."codmateriales" VALUES (63, NULL, 'Materiales', 'CODO 1Y1/2', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (64, NULL, 'Materiales', 'CODO 3/4', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (65, NULL, 'Materiales', 'CORDEL  TOMATERO', 'kg', 3.7375, 2.99);
INSERT INTO "public"."codmateriales" VALUES (66, NULL, 'Materiales', 'CUBETA DE 20L CON TAPA', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (67, NULL, 'Materiales', 'CUCHILLAS DE CORTE', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (68, NULL, 'Materiales', 'Detergente 4 kg', 'U', 5, 4);
INSERT INTO "public"."codmateriales" VALUES (69, NULL, 'Computo', 'DVD_R', 'u', 1.1875, 0.95);
INSERT INTO "public"."codmateriales" VALUES (71, NULL, 'Materiales', 'ESMALTE MARFIL', 'L', 6.08813, 4.8705);
INSERT INTO "public"."codmateriales" VALUES (72, NULL, 'Productos', 'FITOMAS-E', 'L', 1.9875, 1.59);
INSERT INTO "public"."codmateriales" VALUES (73, '', 'Laboratorio', 'FRASCO LAVADOR (500 ML)', 'U', 2.5, 0);
INSERT INTO "public"."codmateriales" VALUES (74, NULL, 'Laboratorio', 'FRASCOS GOTEROS', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (75, NULL, 'Materiales', 'Grampa caiman #55', 'KG', 3.325, 2.66);
INSERT INTO "public"."codmateriales" VALUES (76, NULL, 'Materiales', 'Grampas para cercar', 'Kg', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (77, NULL, 'Materiales', 'Guantes', 'pa', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (78, NULL, 'Laboratorio', 'GUANTES ANTI �CIDOS', 'U', 8.1875, 6.55);
INSERT INTO "public"."codmateriales" VALUES (79, NULL, 'Laboratorio', '', 'U', 7.1875, 5.75);
INSERT INTO "public"."codmateriales" VALUES (80, NULL, 'Materiales', 'HERRADURAS', 'u', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (81, NULL, 'Materiales', 'Interruptor Sencillo', 'U', 1.525, 1.22);
INSERT INTO "public"."codmateriales" VALUES (82, NULL, 'Materiales', 'Jabon  Ba�o', 'U', 0.3375, 0.27);
INSERT INTO "public"."codmateriales" VALUES (83, NULL, 'Materiales', 'Jabon Lavar', 'U', 0.575, 0.46);
INSERT INTO "public"."codmateriales" VALUES (84, NULL, 'Materiales', 'JARRAS PL�STICA DE 2 L', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (85, NULL, 'Materiales', 'L�MINAS DE ZINC GALVANIZADO PLANCHA 1 MM', 'm2', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (86, NULL, 'Materiales', 'Lapices de grafito con goma ', 'u', 0.4375, 0.35);
INSERT INTO "public"."codmateriales" VALUES (87, NULL, 'Materiales', 'Lima plana p/metales', 'U', 2.5625, 2.05);
INSERT INTO "public"."codmateriales" VALUES (88, NULL, 'Materiales', 'LLAVE DE TIRO R�PIDO 1/2''''', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (89, NULL, 'Materiales', 'LLAVINES', 'U', 56.6125, 45.29);
INSERT INTO "public"."codmateriales" VALUES (90, NULL, 'Materiales', 'Machetes 18�', 'U', 15.1875, 12.15);
INSERT INTO "public"."codmateriales" VALUES (91, NULL, 'Materiales', 'MANGUERA 1 1/2', 'm', 10.9625, 8.77);
INSERT INTO "public"."codmateriales" VALUES (92, NULL, 'Materiales', 'MANGUERA 1"', 'm', 1.1375, 0.91);
INSERT INTO "public"."codmateriales" VALUES (93, NULL, 'Materiales', 'MANGUERA DE AGUA  DE 1/2', 'ro', 5, 4);
INSERT INTO "public"."codmateriales" VALUES (94, NULL, 'Materiales', 'MANGUERA PLASTICA DN 3/4�� ', 'm', 0.31675, 0.2534);
INSERT INTO "public"."codmateriales" VALUES (95, NULL, 'Materiales', 'MANTA DE POLIETILENO BAJA DENCIDAD COLOR blanco', 'm2', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (96, NULL, 'Productos', 'MATERIA ORG�NICA', 'M3', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (97, NULL, 'Laboratorio', 'MECHAS DE MECHEROS', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (98, NULL, 'Laboratorio', 'MECHEROS DE ALCOHOL', 'U', 3.125, 2.5);
INSERT INTO "public"."codmateriales" VALUES (99, NULL, 'Herramientas', 'MOCHILA FUMIGACI�N', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (100, NULL, 'Herramientas', 'NAVAJA P/INJERTAR', 'U', 34.327, 27.4616);
INSERT INTO "public"."codmateriales" VALUES (101, NULL, 'Productos', 'NITRATO DE POTASIO', 't', 638.675, 510.94);
INSERT INTO "public"."codmateriales" VALUES (102, NULL, 'Herramientas', 'PALA cuadrada', 'U', 4.125, 3.3);
INSERT INTO "public"."codmateriales" VALUES (103, NULL, 'Materiales', 'Pantal�n ', 'U', 10.5375, 8.43);
INSERT INTO "public"."codmateriales" VALUES (104, '', 'Oficina', 'Papel bond blanco 81/2 X 13 paq (500 hojas) ', 'Pa', 8.825, 7.06);
INSERT INTO "public"."codmateriales" VALUES (105, NULL, 'Herramientas', 'Pico ', 'U', 4.125, 3.3);
INSERT INTO "public"."codmateriales" VALUES (106, NULL, 'Herramientas', 'PICOS  ESPIOCHAS', 'U', 13.8125, 11.05);
INSERT INTO "public"."codmateriales" VALUES (107, NULL, 'Herramientas', 'PIE DE REY', 'U', 35.0504, 28.0403);
INSERT INTO "public"."codmateriales" VALUES (108, NULL, 'Laboratorio', 'PIPETAS (1 ML)', 'U', 5, 4);
INSERT INTO "public"."codmateriales" VALUES (109, NULL, 'Laboratorio', 'PIPETAS (10 ML)', 'U', 5, 4);
INSERT INTO "public"."codmateriales" VALUES (110, NULL, 'Materiales', 'Polvo de piedra', '', 4.225, 3.38);
INSERT INTO "public"."codmateriales" VALUES (111, NULL, 'Oficina', 'Ponchadora ajustable 7-8cm', 'U', 6.25, 5);
INSERT INTO "public"."codmateriales" VALUES (112, NULL, 'Oficina', 'Presilladora Standard', 'U', 14.0875, 11.27);
INSERT INTO "public"."codmateriales" VALUES (113, NULL, 'Oficina', 'Presillas gem (cja 1000)', 'Ca', 1.375, 1.1);
INSERT INTO "public"."codmateriales" VALUES (114, NULL, 'Oficina', 'Presillas p/ presilladoras ', 'Ca', 4.0625, 3.25);
INSERT INTO "public"."codmateriales" VALUES (115, NULL, 'Materiales', 'PRIMARIO ANTICORROSIVO GRIS OXIDO', 'L', 92.3875, 73.91);
INSERT INTO "public"."codmateriales" VALUES (116, NULL, 'Laboratorio', 'PROBETAS (10 ML)', 'U', 4.25, 3.4);
INSERT INTO "public"."codmateriales" VALUES (117, NULL, 'Laboratorio', 'PROBETAS (100 ML)', 'U', 5.25, 4.2);
INSERT INTO "public"."codmateriales" VALUES (118, NULL, 'Laboratorio', 'PROBETAS (1000 ML)', 'U', 21.4375, 17.15);
INSERT INTO "public"."codmateriales" VALUES (119, NULL, 'Laboratorio', 'PROBETAS (25 ML)', 'U', 4.375, 3.5);
INSERT INTO "public"."codmateriales" VALUES (120, NULL, 'Laboratorio', 'PROBETAS (250 ML)', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (121, NULL, 'Laboratorio', 'PROBETAS (50 ML)', 'U', 5.625, 4.5);
INSERT INTO "public"."codmateriales" VALUES (122, NULL, 'Laboratorio', 'PROBETAS (500 ML)', 'U', 6.25, 5);
INSERT INTO "public"."codmateriales" VALUES (123, NULL, 'Materiales', 'Puntilla 2"', 'kg', 1.4625, 1.17);
INSERT INTO "public"."codmateriales" VALUES (124, NULL, 'Materiales', 'Puntilla 3"', 'kg', 1.35, 1.08);
INSERT INTO "public"."codmateriales" VALUES (125, NULL, 'Materiales', 'Puntilla 4"', 'kg', 1.35, 1.08);
INSERT INTO "public"."codmateriales" VALUES (126, NULL, 'Materiales', 'Puntilla 5"', 'kg', 1.35, 1.08);
INSERT INTO "public"."codmateriales" VALUES (127, NULL, 'Materiales', 'REGADERA DE AGUA (10 L)', 'U', 6.25, 5);
INSERT INTO "public"."codmateriales" VALUES (128, NULL, 'Materiales', 'REPUESTO DE RESISTENCIA Y AISLANTE PARA SELLADOR EL�CTRICO.', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (129, NULL, 'Materiales', 'Royo nailon tipo tubo', 'm', NULL, NULL);
INSERT INTO "public"."codmateriales" VALUES (130, NULL, 'Materiales', 'SACOS DE PROLIPROPILENO ', 'U', 12.875, 10.3);
INSERT INTO "public"."codmateriales" VALUES (131, NULL, 'Materiales', 'SILICAGEL INDICADOR', 'Kg', 150.125, 120.1);
INSERT INTO "public"."codmateriales" VALUES (132, NULL, 'Materiales', 'SOGA DE 1 1/2', 't', 320.375, 256.3);
INSERT INTO "public"."codmateriales" VALUES (133, NULL, 'Materiales', 'SOGA DE 3"', 't', 92.35, 73.88);
INSERT INTO "public"."codmateriales" VALUES (134, NULL, 'Productos', 'SUPERFOSFATO TRIPLE', 't', 809.204, 647.363);
INSERT INTO "public"."codmateriales" VALUES (135, NULL, 'Materiales', 'T 1/2''''', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (136, NULL, 'Materiales', 'T 1Y1/2''''', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (137, NULL, 'Materiales', 'T 3/4''''', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (138, NULL, 'Materiales', 'TAMIZ DE 1MM', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (139, NULL, 'Materiales', 'TAMIZ DE 2MM', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (140, NULL, 'Materiales', 'TAMIZ DE 5MM', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (141, NULL, 'Materiales', 'TANQUE (CAPACIDAD 2000 L)', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (142, NULL, 'Materiales', 'TANQUE 20L', 'U', 15, 12);
INSERT INTO "public"."codmateriales" VALUES (143, NULL, 'Materiales', 'TANQUE 500 L', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (144, NULL, 'Materiales', 'TANQUES DE AGUA DE 10L', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (145, NULL, 'Materiales', 'TANQUES PARA AGUA DE 200L', 'U', 7.5, 6);
INSERT INTO "public"."codmateriales" VALUES (146, NULL, 'Materiales', 'TAPE PLASTICO', 'U', 0.6125, 0.49);
INSERT INTO "public"."codmateriales" VALUES (147, NULL, 'Materiales', 'TELA de lienso', 'm', 2.25, 1.8);
INSERT INTO "public"."codmateriales" VALUES (148, NULL, 'Herramientas', 'TERMOMETROS MAXIMA', 'U', 36.25, 29);
INSERT INTO "public"."codmateriales" VALUES (149, NULL, 'Herramientas', 'TERM�METROS M�NIMA', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (150, NULL, 'Herramientas', 'TERM�METROS NORMALES', 'U', 0, 0);
INSERT INTO "public"."codmateriales" VALUES (151, NULL, 'Materiales', 'TIJERA DE PODAR', 'U', 68.75, 55);
INSERT INTO "public"."codmateriales" VALUES (152, NULL, 'Materiales', 'TIJERA NORMAL', 'U', 6.875, 5.5);
INSERT INTO "public"."codmateriales" VALUES (153, NULL, 'Materiales', 'Tomas Corrientes Dobles', 'U', 1, 0.8);
INSERT INTO "public"."codmateriales" VALUES (154, NULL, 'Materiales', 'Toner para impresora HP LasserJet P1006', 'U', 87.5, 70);
INSERT INTO "public"."codmateriales" VALUES (155, NULL, 'Materiales', 'Tubo ac galv p/gas agua 1/2"', 't', 1624.3, 1299.44);
INSERT INTO "public"."codmateriales" VALUES (156, NULL, 'Productos', 'UREA', 't', 534.701, 427.761);
INSERT INTO "public"."codmateriales" VALUES (157, NULL, 'Laboratorio', 'VOLUMETRICO (1000 ML)', 'U', 10.525, 8.42);
INSERT INTO "public"."codmateriales" VALUES (158, NULL, 'Laboratorio', 'VOLUMETRICO (2000 ML)', 'U', 11.125, 8.9);
INSERT INTO "public"."codmateriales" VALUES (159, NULL, 'Laboratorio', 'VOLUMETRICO (500 ML)', 'U', 10.4125, 8.33);
INSERT INTO "public"."codmateriales" VALUES (160, NULL, 'Laboratorio', 'YODO METÍLICO (500 G)', 'Fr', 200, 0);
INSERT INTO "public"."codmateriales" VALUES (161, NULL, 'Laboratorio', 'YODURO DE POTASIO (500 G)', 'Fr', 10, 0);
INSERT INTO "public"."codmateriales" VALUES (162, NULL, 'Materiales', 'Zaran tdg', 'm2', 1.875, 1.5);
INSERT INTO "public"."codmateriales" VALUES (163, '2548', 'Laboratorio', 'Timerosal', 'L', 50, 0);
INSERT INTO "public"."codmateriales" VALUES (181, '35667', 'Computo', 'Impresora', 'u', 300, 100);
INSERT INTO "public"."codmateriales" VALUES (183, '1000', 'Computo', 'Medios de computo', 'u', 0, 1);
INSERT INTO "public"."codmateriales" VALUES (185, '2000', 'Laboratorio', 'Material de laboratorio', 'u', 0, 1);
INSERT INTO "public"."codmateriales" VALUES (186, '2001', 'Laboratorio', 'Material de laboratorio CUP', 'u', 1, 0);
INSERT INTO "public"."codmateriales" VALUES (187, '3000', 'Materiales', 'Materiales varios CUC', 'u', 0, 1);
INSERT INTO "public"."codmateriales" VALUES (189, '3698', 'Computo', 'Tsd', 'u', 56, 24);
INSERT INTO "public"."codmateriales" VALUES (180, 'kjhhh', '2', 'aaaa', 'a', 12, 12);

-- ----------------------------
-- Table structure for conceptos
-- ----------------------------
DROP TABLE IF EXISTS "public"."conceptos";
CREATE TABLE "public"."conceptos" (
  "codigo" varchar(4) COLLATE "pg_catalog"."default" NOT NULL,
  "descripcion" varchar(80) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of conceptos
-- ----------------------------
INSERT INTO "public"."conceptos" VALUES ('01', 'Salario');
INSERT INTO "public"."conceptos" VALUES ('02', 'Res. 15');
INSERT INTO "public"."conceptos" VALUES ('03', 'Pago por Resultados');
INSERT INTO "public"."conceptos" VALUES ('04', '9.09 %');
INSERT INTO "public"."conceptos" VALUES ('05', '14% Seg. Social');
INSERT INTO "public"."conceptos" VALUES ('06', '12% Seg. Social');
INSERT INTO "public"."conceptos" VALUES ('07', 'Materiales');
INSERT INTO "public"."conceptos" VALUES ('08', 'Combustible');
INSERT INTO "public"."conceptos" VALUES ('09', 'Energia');
INSERT INTO "public"."conceptos" VALUES ('10', 'Subcontrataciones');
INSERT INTO "public"."conceptos" VALUES ('11', 'Dietas');
INSERT INTO "public"."conceptos" VALUES ('1100', 'Materiales');
INSERT INTO "public"."conceptos" VALUES ('1110', 'Lubricantes Comprados');
INSERT INTO "public"."conceptos" VALUES ('1112', 'Otras Materias Primas Compradas');
INSERT INTO "public"."conceptos" VALUES ('1113', 'Otros Materiales Comprados');
INSERT INTO "public"."conceptos" VALUES ('1114', 'Herbicidas Comprados');
INSERT INTO "public"."conceptos" VALUES ('1121', 'Neumáticos, Cámaras y Accesorios Comprados');
INSERT INTO "public"."conceptos" VALUES ('1122', 'Rodamientos Comunes Comprados');
INSERT INTO "public"."conceptos" VALUES ('1124', 'Electrodos Normales Comprados');
INSERT INTO "public"."conceptos" VALUES ('1127', 'Insumos Químicos Derivados Comprados');
INSERT INTO "public"."conceptos" VALUES ('1133', 'PPA-Maquinarias y Equipos Agrícolas');
INSERT INTO "public"."conceptos" VALUES ('1135', 'Ropa y Calzado');
INSERT INTO "public"."conceptos" VALUES ('1136', 'Medios de Protección');
INSERT INTO "public"."conceptos" VALUES ('12', 'Eventos');
INSERT INTO "public"."conceptos" VALUES ('13', 'Seminarios');
INSERT INTO "public"."conceptos" VALUES ('14', 'Otros Servicios');
INSERT INTO "public"."conceptos" VALUES ('15', 'Inversiones');
INSERT INTO "public"."conceptos" VALUES ('16', 'Indirectos');
INSERT INTO "public"."conceptos" VALUES ('17', 'Informacion');
INSERT INTO "public"."conceptos" VALUES ('18', 'Pagos a terceros');
INSERT INTO "public"."conceptos" VALUES ('3000', 'Combustible');
INSERT INTO "public"."conceptos" VALUES ('3101', 'Gasolina');
INSERT INTO "public"."conceptos" VALUES ('3102', 'Gas Oil');
INSERT INTO "public"."conceptos" VALUES ('3201', 'Lubricantes');
INSERT INTO "public"."conceptos" VALUES ('4000', 'Energía');
INSERT INTO "public"."conceptos" VALUES ('5000', 'Salarios');
INSERT INTO "public"."conceptos" VALUES ('5100', 'Salario Escala');
INSERT INTO "public"."conceptos" VALUES ('5200', 'Vacaciones Acumuladas (9.09%)');
INSERT INTO "public"."conceptos" VALUES ('5300', 'Estimulación y Pago por Resultado');
INSERT INTO "public"."conceptos" VALUES ('5310', 'Estimulación y Pago por Resultado(Pagado)');
INSERT INTO "public"."conceptos" VALUES ('5500', 'Otros pagos adicionals legalmente aprobados');
INSERT INTO "public"."conceptos" VALUES ('7000', 'Amortización');
INSERT INTO "public"."conceptos" VALUES ('7100', 'Depreciación Plantaciones Cañeras');
INSERT INTO "public"."conceptos" VALUES ('7150', 'Depreciación de Otros Activos Fijos Tangibles');
INSERT INTO "public"."conceptos" VALUES ('8000', 'Otros gasos monetarios');
INSERT INTO "public"."conceptos" VALUES ('8100', 'Servicios comprados entre entidades');
INSERT INTO "public"."conceptos" VALUES ('8121', 'Servicio de Corte, Alza y Tiro');
INSERT INTO "public"."conceptos" VALUES ('8129', 'Servicio de Transportación-MN');
INSERT INTO "public"."conceptos" VALUES ('8410', 'Alimentación y Hospedajes-MN');
INSERT INTO "public"."conceptos" VALUES ('9600', 'Gastos Indirectos de Produción');

-- ----------------------------
-- Table structure for datos
-- ----------------------------
DROP TABLE IF EXISTS "public"."datos";
CREATE TABLE "public"."datos" (
  "id_proy" varchar(255) COLLATE "pg_catalog"."default",
  "resultado" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Table structure for etapa_presup_prov
-- ----------------------------
DROP TABLE IF EXISTS "public"."etapa_presup_prov";
CREATE TABLE "public"."etapa_presup_prov" (
  "id" int8 NOT NULL DEFAULT nextval('etapa_presup_prov_id_seq'::regclass),
  "id_etapa" int8,
  "provincia" int8,
  "presupuesto" float4
)
;

-- ----------------------------
-- Table structure for etapas
-- ----------------------------
DROP TABLE IF EXISTS "public"."etapas";
CREATE TABLE "public"."etapas" (
  "id_proy" int8,
  "id_resultado" int8,
  "etapa" varchar(255) COLLATE "pg_catalog"."default",
  "inicio" varchar(15) COLLATE "pg_catalog"."default",
  "termino" varchar(15) COLLATE "pg_catalog"."default",
  "abril" float4,
  "junio" float4,
  "julio" float4,
  "agosto" float4,
  "septiembre" float4,
  "octubre" float4,
  "noviembre" float4,
  "diciembre" float4,
  "id" int8 NOT NULL DEFAULT nextval('etapas_id_seq'::regclass),
  "indicador" text COLLATE "pg_catalog"."default"
)
;


-- ----------------------------
-- Table structure for experimentos_vigentes
-- ----------------------------
DROP TABLE IF EXISTS "public"."experimentos_vigentes";
CREATE TABLE "public"."experimentos_vigentes" (
  "id_proy" int4,
  "clave" varchar(10) COLLATE "pg_catalog"."default",
  "anno" varchar(4) COLLATE "pg_catalog"."default",
  "provincia" varchar(2) COLLATE "pg_catalog"."default",
  "lat" float4,
  "long" float4,
  "cosecha_ant" date,
  "cosecha_act" date,
  "cepa" varchar(20) COLLATE "pg_catalog"."default",
  "variedad" varchar(15) COLLATE "pg_catalog"."default",
  "suelo" varchar(50) COLLATE "pg_catalog"."default",
  "estado" varchar(255) COLLATE "pg_catalog"."default",
  "proto_act" varchar(255) COLLATE "pg_catalog"."default",
  "contin" varchar(255) COLLATE "pg_catalog"."default",
  "id" int8 NOT NULL DEFAULT nextval('experimentos_vigentes_id_seq'::regclass)
)
;

-- ----------------------------
-- Table structure for fuentes_fin
-- ----------------------------
DROP TABLE IF EXISTS "public"."fuentes_fin";
CREATE TABLE "public"."fuentes_fin" (
  "codigo" varchar(3) COLLATE "pg_catalog"."default" NOT NULL,
  "nombre" varchar(100) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of fuentes_fin
-- ----------------------------
INSERT INTO "public"."fuentes_fin" VALUES ('001', 'PROYECTOS FINANCIADOS POR EL FONCI');
INSERT INTO "public"."fuentes_fin" VALUES ('002', 'PROYECTOS INICA AUTOFINANCIADOS');
INSERT INTO "public"."fuentes_fin" VALUES ('003', 'PROYECTOS AZCUBA FONDO DESARROLLO DE LA CIENCIA');

-- ----------------------------
-- Table structure for gastos
-- ----------------------------
DROP TABLE IF EXISTS "public"."gastos";
CREATE TABLE "public"."gastos" (
  "id" int2 NOT NULL DEFAULT nextval('gastos_id_seq'::regclass),
  "id_proy" int8,
  "id_prov" varchar(2) COLLATE "pg_catalog"."default",
  "mes" int2,
  "e_1000" float4,
  "e_3000" float4,
  "e_4000" float4,
  "e_5100" float4,
  "e_5200" float4,
  "e_5300" float4,
  "e_5500" float4,
  "e_7000" float4,
  "e_8000" float4,
  "indirectos" float4
)
;

-- ----------------------------
-- Table structure for materiales_plan
-- ----------------------------
DROP TABLE IF EXISTS "public"."materiales_plan";
CREATE TABLE "public"."materiales_plan" (
  "idproyecto" int4,
  "anno" int4,
  "provincia" varchar(2) COLLATE "pg_catalog"."default",
  "tipo" varchar(30) COLLATE "pg_catalog"."default",
  "cantidad" float4,
  "idmaterial" int8,
  "id" int8 NOT NULL DEFAULT nextval('materiales_plan_id_seq'::regclass)
)
;

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS "public"."members";
CREATE TABLE "public"."members" (
  "id" int4 NOT NULL,
  "user_id" int4 NOT NULL,
  "project_id" int4 NOT NULL,
  "created_on" timestamp(6),
  "mail_notification" int2 NOT NULL
)
;

-- ----------------------------
-- Table structure for meses
-- ----------------------------
DROP TABLE IF EXISTS "public"."meses";
CREATE TABLE "public"."meses" (
  "id" int4 NOT NULL,
  "nombre" varchar(10) COLLATE "pg_catalog"."default",
  "nombre_corto" varchar(3) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of meses
-- ----------------------------
INSERT INTO "public"."meses" VALUES (1, 'Enero', 'Ene');
INSERT INTO "public"."meses" VALUES (2, 'Febrero', 'Feb');
INSERT INTO "public"."meses" VALUES (3, 'Marzo', 'Mar');
INSERT INTO "public"."meses" VALUES (4, 'Abril', 'Abr');
INSERT INTO "public"."meses" VALUES (5, 'Mayo', 'May');
INSERT INTO "public"."meses" VALUES (6, 'Junio', 'Jun');
INSERT INTO "public"."meses" VALUES (7, 'Julio', 'Jul');
INSERT INTO "public"."meses" VALUES (8, 'Agosto', 'Ago');
INSERT INTO "public"."meses" VALUES (9, 'Septiembre', 'Sep');
INSERT INTO "public"."meses" VALUES (10, 'Octubre', 'Oct');
INSERT INTO "public"."meses" VALUES (11, 'Noviembre', 'Nov');
INSERT INTO "public"."meses" VALUES (12, 'Diciembre', 'Dic');

-- ----------------------------
-- Table structure for otros_gastos_plan
-- ----------------------------
DROP TABLE IF EXISTS "public"."otros_gastos_plan";
CREATE TABLE "public"."otros_gastos_plan" (
  "id" int8 NOT NULL DEFAULT nextval('otros_gastos_plan_id_seq'::regclass),
  "id_proy" int8 NOT NULL,
  "anno" varchar(4) COLLATE "pg_catalog"."default" NOT NULL,
  "materiales" float4,
  "combustible" float4,
  "energia" float4,
  "dieta" float4,
  "eventos" float4,
  "seminarios" float4,
  "otros_serv" float4,
  "capital" float4,
  "otros_ind" float4,
  "provincia" varchar(2) COLLATE "pg_catalog"."default" NOT NULL
)
;
-- ----------------------------
-- Table structure for otros_gastos_real
-- ----------------------------
DROP TABLE IF EXISTS "public"."otros_gastos_real";
CREATE TABLE "public"."otros_gastos_real" (
  "id" int8 NOT NULL DEFAULT nextval('otros_gastos_plan_id_seq'::regclass),
  "id_proy" int8 NOT NULL,
  "anno" varchar(4) COLLATE "pg_catalog"."default" NOT NULL,
  "materiales" float4,
  "combustible" float4,
  "energia" float4,
  "dieta" float4,
  "eventos" float4,
  "seminarios" float4,
  "otros_serv" float4,
  "capital" float4,
  "otros_ind" float4,
  "provincia" varchar(2) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Table structure for personal
-- ----------------------------
DROP TABLE IF EXISTS "public"."personal";
CREATE TABLE "public"."personal" (
  "id" int8 NOT NULL DEFAULT nextval('personal_id_seq'::regclass),
  "nombre_ape" varchar(80) COLLATE "pg_catalog"."default" NOT NULL,
  "grado" varchar(3) COLLATE "pg_catalog"."default",
  "categoria" int2,
  "provincia" varchar(2) COLLATE "pg_catalog"."default" NOT NULL,
  "salario" float4,
  "email" varchar(100) COLLATE "pg_catalog"."default",
  "especialidad" varchar(255) COLLATE "pg_catalog"."default",
  "nivel" varchar(50) COLLATE "pg_catalog"."default",
  "ci" varchar(11) COLLATE "pg_catalog"."default",
  "sexo" varchar(255) COLLATE "pg_catalog"."default",
  "cargo" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Table structure for personal_proy
-- ----------------------------
DROP TABLE IF EXISTS "public"."personal_proy";
CREATE TABLE "public"."personal_proy" (
  "id" int8 NOT NULL DEFAULT nextval('personal_proy_id_seq'::regclass),
  "id_proy" int8 NOT NULL,
  "id_personal" int8 NOT NULL,
  "porc_part" int4,
  "estimulacion" float4,
  "pago_res" float4,
  "jefe" bool
)
;

-- ----------------------------
-- Table structure for phpgen_users
-- ----------------------------
DROP TABLE IF EXISTS "public"."phpgen_users";
CREATE TABLE "public"."phpgen_users" (
  "user_id" int4 NOT NULL DEFAULT nextval('phpgen_users_user_id_seq'::regclass),
  "user_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "user_password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "user_email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "user_token" varchar(255) COLLATE "pg_catalog"."default",
  "user_status" int4 NOT NULL DEFAULT 0
)
;
COMMENT ON COLUMN "public"."phpgen_users"."user_token" IS 'Token for user account verification or user password reset.';
COMMENT ON COLUMN "public"."phpgen_users"."user_status" IS '0 = OK, 1 = Account verification required, 2 = Password reset requested.';

-- ----------------------------
-- Records of phpgen_users
-- ----------------------------
INSERT INTO "public"."phpgen_users" VALUES (2, 'admin', '4999548ca28952e6460b08d5b3e9a007b3ab6c163bd513c25f2064cbe6d3b907', 'luis@etica.cu', NULL, 0);

-- ----------------------------
-- Table structure for plan_gastos
-- ----------------------------
DROP TABLE IF EXISTS "public"."plan_gastos";
CREATE TABLE "public"."plan_gastos" (
  "id" int4 NOT NULL,
  "id_proyecto" int4,
  "anno" varchar(4) COLLATE "pg_catalog"."default",
  "mes" int4,
  "provincia" varchar(2) COLLATE "pg_catalog"."default",
  "concepto" varchar(6) COLLATE "pg_catalog"."default",
  "cup" float4,
  "cuc" float4
)
;

-- ----------------------------
-- Table structure for provincias
-- ----------------------------
DROP TABLE IF EXISTS "public"."provincias";
CREATE TABLE "public"."provincias" (
  "idprovincias" varchar(2) COLLATE "pg_catalog"."default" NOT NULL,
  "nombre" varchar(45) COLLATE "pg_catalog"."default",
  "territorio" varchar(2) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of provincias
-- ----------------------------
INSERT INTO "public"."provincias" VALUES ('00', 'SEDE', '01');
INSERT INTO "public"."provincias" VALUES ('01', 'Artemisa', '02');
INSERT INTO "public"."provincias" VALUES ('02', 'Mayabeque', '02');
INSERT INTO "public"."provincias" VALUES ('03', 'Isla de la Juventud', '03');
INSERT INTO "public"."provincias" VALUES ('04', 'Matanzas', '04');
INSERT INTO "public"."provincias" VALUES ('05', 'Cienfuegos', '05');
INSERT INTO "public"."provincias" VALUES ('06', 'Villa Clara', '05');
INSERT INTO "public"."provincias" VALUES ('07', 'Sancti Spíritus', '06');
INSERT INTO "public"."provincias" VALUES ('08', 'Ciego de Avila', '07');
INSERT INTO "public"."provincias" VALUES ('09', 'Camagüey', '07');
INSERT INTO "public"."provincias" VALUES ('10', 'Las Tunas', '07');
INSERT INTO "public"."provincias" VALUES ('11', 'Holguín', '08');
INSERT INTO "public"."provincias" VALUES ('12', 'Granma', '09');
INSERT INTO "public"."provincias" VALUES ('13', 'Santiago de Cuba', '09');
INSERT INTO "public"."provincias" VALUES ('14', 'Guantánamo', '09');
INSERT INTO "public"."provincias" VALUES ('15', 'Subcontrataciones', NULL);

-- ----------------------------
-- Table structure for proyectos
-- ----------------------------
DROP TABLE IF EXISTS "public"."proyectos";
CREATE TABLE "public"."proyectos" (
  "id" int4 NOT NULL DEFAULT nextval('proyectos_id_seq'::regclass),
  "fuente" varchar(3) COLLATE "pg_catalog"."default" NOT NULL,
  "area" varchar(3) COLLATE "pg_catalog"."default" NOT NULL,
  "cod" varchar(3) COLLATE "pg_catalog"."default" NOT NULL,
  "nombre" varchar(255) COLLATE "pg_catalog"."default",
  "descripcion" text COLLATE "pg_catalog"."default",
  "palab_claves" varchar(255) COLLATE "pg_catalog"."default",
  "basica" bool,
  "aplicada" bool,
  "desarrollo" bool,
  "formacion" bool,
  "innovacion" bool,
  "id_jefe_proy" int8,
  "inicio" date,
  "fin" date,
  "desactivar" bool,
  "clasificacion" varchar(255) COLLATE "pg_catalog"."default",
  "presupuesto" varchar(255) COLLATE "pg_catalog"."default",
  "objetivo_gral" text COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Table structure for prueba_json
-- ----------------------------
DROP TABLE IF EXISTS "public"."prueba_json";
CREATE TABLE "public"."prueba_json" (
  "id" int8 NOT NULL DEFAULT nextval('prueba_json_id_seq'::regclass),
  "datos" json,
  "nombre" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Table structure for real_gastos
-- ----------------------------
DROP TABLE IF EXISTS "public"."real_gastos";
CREATE TABLE "public"."real_gastos" (
  "id" int4 NOT NULL,
  "id_proyecto" int4,
  "anno" varchar(4) COLLATE "pg_catalog"."default",
  "mes" int4,
  "provincia" varchar(2) COLLATE "pg_catalog"."default",
  "concepto" varchar(6) COLLATE "pg_catalog"."default",
  "cup" float4,
  "cuc" float4
)
;

-- ----------------------------
-- Table structure for reportes
-- ----------------------------
DROP TABLE IF EXISTS "public"."reportes";
CREATE TABLE "public"."reportes" (
  "id" int2 NOT NULL DEFAULT nextval('reportes_id_seq'::regclass),
  "codigo" varchar(2) COLLATE "pg_catalog"."default",
  "descripcion" varchar(150) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of reportes
-- ----------------------------
INSERT INTO "public"."reportes" VALUES (1, '00', 'Portada');
INSERT INTO "public"."reportes" VALUES (3, '02', 'PTE - 2 Cronograma de ejecución del proyecto');
INSERT INTO "public"."reportes" VALUES (4, '03', 'PTE - 3 Participantes en el proyecto');
INSERT INTO "public"."reportes" VALUES (5, '04', 'PTE - 4 Presupuesto global del proyecto');
INSERT INTO "public"."reportes" VALUES (6, '05', NULL);
INSERT INTO "public"."reportes" VALUES (7, '06', 'PTE - 6 Presupuesto total por territorios');
INSERT INTO "public"."reportes" VALUES (8, '07', 'PTE - 7 Experimentos vigentes');
INSERT INTO "public"."reportes" VALUES (9, '08', 'CTE - 1 Cumplimiento del cronograma de investigaciones');
INSERT INTO "public"."reportes" VALUES (10, '09', 'CTE - 2 Gastos por proyectos y elementos');
INSERT INTO "public"."reportes" VALUES (2, '01', 'PTE - 1 Resultados esperados y principales actividades por dependencia y recursos humanos involucrados');

-- ----------------------------
-- Table structure for resultado_etapa
-- ----------------------------
DROP TABLE IF EXISTS "public"."resultado_etapa";
CREATE TABLE "public"."resultado_etapa" (
  "id" int8 NOT NULL DEFAULT nextval('resultado_etapa_id_seq'::regclass),
  "id_resultado" int8,
  "etapa" varchar(255) COLLATE "pg_catalog"."default",
  "inicio" varchar(255) COLLATE "pg_catalog"."default",
  "termino" int4,
  "abril" float4,
  "junio" float4,
  "julio" float4,
  "agosto" float4,
  "septiembre" float4,
  "octubre" float4,
  "noviembre" float4,
  "diciembre" float4
)
;

-- ----------------------------
-- Table structure for resultados
-- ----------------------------
DROP TABLE IF EXISTS "public"."resultados";
CREATE TABLE "public"."resultados" (
  "id_proy" int8,
  "Resultado" varchar(255) COLLATE "pg_catalog"."default",
  "id" int8 NOT NULL DEFAULT nextval('resultados_id_seq'::regclass)
)
;


-- ----------------------------
-- Table structure for suelos
-- ----------------------------
DROP TABLE IF EXISTS "public"."suelos";
CREATE TABLE "public"."suelos" (
  "codigo" varchar(2) COLLATE "pg_catalog"."default" NOT NULL,
  "descripcio" varchar(20) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of suelos
-- ----------------------------
INSERT INTO "public"."suelos" VALUES ('01', 'FERRALITICO CALCICO');
INSERT INTO "public"."suelos" VALUES ('02', 'FERRITIZADO');
INSERT INTO "public"."suelos" VALUES ('03', 'FERRALI. CUARCITI');
INSERT INTO "public"."suelos" VALUES ('04', 'FERSIALIT. CALCICO');
INSERT INTO "public"."suelos" VALUES ('05', 'SIALITIZ. CALCICO');
INSERT INTO "public"."suelos" VALUES ('06', 'SIALITIZ. NO CALCICO');
INSERT INTO "public"."suelos" VALUES ('07', 'VERTISUELO');
INSERT INTO "public"."suelos" VALUES ('08', 'GLEY. SIALITIZADO');
INSERT INTO "public"."suelos" VALUES ('09', 'GLEY. FERRALITIZADO');
INSERT INTO "public"."suelos" VALUES ('10', 'ALUVIAL');

-- ----------------------------
-- Table structure for tareas_part
-- ----------------------------
DROP TABLE IF EXISTS "public"."tareas_part";
CREATE TABLE "public"."tareas_part" (
  "id" int8 NOT NULL DEFAULT nextval('tareas_part_id_seq'::regclass),
  "id_tarea" int8 NOT NULL,
  "id_user" int8 NOT NULL DEFAULT nextval('tareas_part_id_user_seq'::regclass),
  "horas" float4
)
;

-- ----------------------------
-- Table structure for territorios
-- ----------------------------
DROP TABLE IF EXISTS "public"."territorios";
CREATE TABLE "public"."territorios" (
  "codigo" varchar(2) COLLATE "pg_catalog"."default" NOT NULL,
  "nombre" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of territorios
-- ----------------------------
INSERT INTO "public"."territorios" VALUES ('01', 'SEDE');
INSERT INTO "public"."territorios" VALUES ('02', 'Artemisa - Mayabeque');
INSERT INTO "public"."territorios" VALUES ('03', 'SEDE');
INSERT INTO "public"."territorios" VALUES ('04', 'Matanzas');
INSERT INTO "public"."territorios" VALUES ('05', 'Villa Clara-Cfgos');
INSERT INTO "public"."territorios" VALUES ('06', 'Sancti Spiritus');
INSERT INTO "public"."territorios" VALUES ('07', 'Centro Oriental');
INSERT INTO "public"."territorios" VALUES ('08', 'Holguín');
INSERT INTO "public"."territorios" VALUES ('09', 'Oriente Sur');

-- ----------------------------
-- Table structure for tipos
-- ----------------------------
DROP TABLE IF EXISTS "public"."tipos";
CREATE TABLE "public"."tipos" (
  "id" varchar(1) COLLATE "pg_catalog"."default" NOT NULL,
  "nombre" varchar(15) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of tipos
-- ----------------------------
INSERT INTO "public"."tipos" VALUES ('1', 'Computo');
INSERT INTO "public"."tipos" VALUES ('2', 'Equipos');
INSERT INTO "public"."tipos" VALUES ('3', 'Herramientas');
INSERT INTO "public"."tipos" VALUES ('4', 'Laboratorio');
INSERT INTO "public"."tipos" VALUES ('5', 'Materiales');
INSERT INTO "public"."tipos" VALUES ('6', 'Oficina');
INSERT INTO "public"."tipos" VALUES ('7', 'Productos');

-- ----------------------------
-- Table structure for user_perms
-- ----------------------------
DROP TABLE IF EXISTS "public"."user_perms";
CREATE TABLE "public"."user_perms" (
  "user_id" int4 NOT NULL,
  "page_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "perm_name" varchar(6) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of user_perms
-- ----------------------------
INSERT INTO "public"."user_perms" VALUES (2, '', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, '', 'SELECT');
INSERT INTO "public"."user_perms" VALUES (0, 'public.otros_gastos_plan', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.experimentos_vigentes', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.real_gastos', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.otros_gastos_real', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.areas', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.cepa', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.codmateriales', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.conceptos', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.fuentes_fin', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.meses', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.personal', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.personal.public.personal_proy', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.provincias', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.suelos', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.territorios', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (0, 'public.variedades', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (-1, '', 'SELECT');
INSERT INTO "public"."user_perms" VALUES (3, 'public.proyectos', 'INSERT');
INSERT INTO "public"."user_perms" VALUES (3, 'public.proyectos', 'DELETE');
INSERT INTO "public"."user_perms" VALUES (3, 'public.proyectos', 'UPDATE');
INSERT INTO "public"."user_perms" VALUES (3, 'public.proyectos', 'SELECT');
INSERT INTO "public"."user_perms" VALUES (3, 'public.proyectos.public.personal_proy', 'SELECT');
INSERT INTO "public"."user_perms" VALUES (3, 'public.proyectos.public.personal_proy', 'UPDATE');
INSERT INTO "public"."user_perms" VALUES (3, 'public.proyectos.public.personal_proy', 'INSERT');
INSERT INTO "public"."user_perms" VALUES (3, 'public.proyectos.public.personal_proy', 'DELETE');
INSERT INTO "public"."user_perms" VALUES (3, 'public.plan_gastos', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (3, 'public.personal_proy', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (3, 'public.tareas', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (3, 'public.tareas_part', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (3, 'public.materiales_plan', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (3, 'public.otros_gastos_plan', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (3, 'public.experimentos_vigentes', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (3, 'public.real_gastos', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (3, 'public.codmateriales', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (3, 'public.personal', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (3, 'public.personal.public.personal_proy', 'ADMIN');
INSERT INTO "public"."user_perms" VALUES (3, 'public.otros_gastos_real', 'ADMIN');

-- ----------------------------
-- Table structure for variedades
-- ----------------------------
DROP TABLE IF EXISTS "public"."variedades";
CREATE TABLE "public"."variedades" (
  "codigo" varchar(3) COLLATE "pg_catalog"."default" NOT NULL,
  "nombre" varchar(12) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of variedades
-- ----------------------------
INSERT INTO "public"."variedades" VALUES ('001', 'Ja60-5');
INSERT INTO "public"."variedades" VALUES ('002', 'C323-68');
INSERT INTO "public"."variedades" VALUES ('003', 'C120-78');
INSERT INTO "public"."variedades" VALUES ('004', 'C87-51');
INSERT INTO "public"."variedades" VALUES ('005', 'CP52-43');
INSERT INTO "public"."variedades" VALUES ('006', 'My5514');
INSERT INTO "public"."variedades" VALUES ('007', 'C266-70');
INSERT INTO "public"."variedades" VALUES ('008', 'C1051-73');
INSERT INTO "public"."variedades" VALUES ('009', 'Ja64-19');
INSERT INTO "public"."variedades" VALUES ('010', 'Ty70-17');
INSERT INTO "public"."variedades" VALUES ('011', 'C1616-75');
INSERT INTO "public"."variedades" VALUES ('012', 'C568-75');
INSERT INTO "public"."variedades" VALUES ('013', 'B7274');
INSERT INTO "public"."variedades" VALUES ('014', 'B63118');
INSERT INTO "public"."variedades" VALUES ('015', 'C294-70');
INSERT INTO "public"."variedades" VALUES ('016', 'C290-73');
INSERT INTO "public"."variedades" VALUES ('017', 'B77418');
INSERT INTO "public"."variedades" VALUES ('018', 'C1324-74');
INSERT INTO "public"."variedades" VALUES ('019', 'C751-75');
INSERT INTO "public"."variedades" VALUES ('020', 'B42231');
INSERT INTO "public"."variedades" VALUES ('021', 'B62163');
INSERT INTO "public"."variedades" VALUES ('022', 'C236-51');
INSERT INTO "public"."variedades" VALUES ('023', 'C334-64');
INSERT INTO "public"."variedades" VALUES ('024', 'C819-67');
INSERT INTO "public"."variedades" VALUES ('025', 'C187-68');
INSERT INTO "public"."variedades" VALUES ('026', 'C172-72');
INSERT INTO "public"."variedades" VALUES ('027', 'C374-72');
INSERT INTO "public"."variedades" VALUES ('028', 'C439-72');
INSERT INTO "public"."variedades" VALUES ('029', 'Ja60-3');
INSERT INTO "public"."variedades" VALUES ('030', 'Ja64-11');
INSERT INTO "public"."variedades" VALUES ('031', 'Ja64-20');
INSERT INTO "public"."variedades" VALUES ('032', 'My54-65');
INSERT INTO "public"."variedades" VALUES ('033', 'My24129');
INSERT INTO "public"."variedades" VALUES ('034', 'My5715');
INSERT INTO "public"."variedades" VALUES ('035', 'POJ2878');
INSERT INTO "public"."variedades" VALUES ('036', 'PPQK');
INSERT INTO "public"."variedades" VALUES ('037', 'PR980');
INSERT INTO "public"."variedades" VALUES ('038', 'Ty76-16');
INSERT INTO "public"."variedades" VALUES ('039', 'Ty76-25');
INSERT INTO "public"."variedades" VALUES ('040', 'Ty76-49');
INSERT INTO "public"."variedades" VALUES ('041', 'B51129');
INSERT INTO "public"."variedades" VALUES ('042', 'CG127-45');
INSERT INTO "public"."variedades" VALUES ('043', 'Co997');
INSERT INTO "public"."variedades" VALUES ('044', 'B80250');
INSERT INTO "public"."variedades" VALUES ('045', 'B80-509');
INSERT INTO "public"."variedades" VALUES ('046', 'C138-77');
INSERT INTO "public"."variedades" VALUES ('047', 'C111-79');
INSERT INTO "public"."variedades" VALUES ('048', 'C2180-80');
INSERT INTO "public"."variedades" VALUES ('049', 'C132-81');
INSERT INTO "public"."variedades" VALUES ('050', 'C137-81');
INSERT INTO "public"."variedades" VALUES ('051', 'C140-81');
INSERT INTO "public"."variedades" VALUES ('052', 'C130-82');
INSERT INTO "public"."variedades" VALUES ('053', 'C203-82');
INSERT INTO "public"."variedades" VALUES ('054', 'C128-83');
INSERT INTO "public"."variedades" VALUES ('055', 'C85-1');
INSERT INTO "public"."variedades" VALUES ('056', 'C85-101');
INSERT INTO "public"."variedades" VALUES ('057', 'C85-212');
INSERT INTO "public"."variedades" VALUES ('058', 'C85-214');
INSERT INTO "public"."variedades" VALUES ('059', 'C85-393');
INSERT INTO "public"."variedades" VALUES ('060', 'C86-12');
INSERT INTO "public"."variedades" VALUES ('061', 'C85-403');
INSERT INTO "public"."variedades" VALUES ('062', 'C86-456');
INSERT INTO "public"."variedades" VALUES ('063', 'C86-502');
INSERT INTO "public"."variedades" VALUES ('064', 'C86-503');
INSERT INTO "public"."variedades" VALUES ('065', 'C86-531');
INSERT INTO "public"."variedades" VALUES ('066', 'C86-602');
INSERT INTO "public"."variedades" VALUES ('067', 'C88-380');
INSERT INTO "public"."variedades" VALUES ('068', 'C88-382');
INSERT INTO "public"."variedades" VALUES ('069', 'C89-302');
INSERT INTO "public"."variedades" VALUES ('070', 'C91-103');
INSERT INTO "public"."variedades" VALUES ('071', 'Ty86-28');
INSERT INTO "public"."variedades" VALUES ('072', 'C275-80');
INSERT INTO "public"."variedades" VALUES ('073', 'My5778');
INSERT INTO "public"."variedades" VALUES ('074', 'H336110');
INSERT INTO "public"."variedades" VALUES ('075', 'C227-59');
INSERT INTO "public"."variedades" VALUES ('076', 'CB44-52');
INSERT INTO "public"."variedades" VALUES ('077', 'Q124');
INSERT INTO "public"."variedades" VALUES ('078', 'RB72454');
INSERT INTO "public"."variedades" VALUES ('079', 'SP70-1143');
INSERT INTO "public"."variedades" VALUES ('080', 'SP70-1284');
INSERT INTO "public"."variedades" VALUES ('081', 'SP71-1406');
INSERT INTO "public"."variedades" VALUES ('082', 'C85-102');
INSERT INTO "public"."variedades" VALUES ('083', 'C86-165');
INSERT INTO "public"."variedades" VALUES ('084', 'C88-187');
INSERT INTO "public"."variedades" VALUES ('085', 'C90-316');
INSERT INTO "public"."variedades" VALUES ('086', 'C90-317');
INSERT INTO "public"."variedades" VALUES ('087', 'C90-325');
INSERT INTO "public"."variedades" VALUES ('088', 'C90-469');
INSERT INTO "public"."variedades" VALUES ('089', 'C90-501');
INSERT INTO "public"."variedades" VALUES ('090', 'C90-530');
INSERT INTO "public"."variedades" VALUES ('091', 'C86-56');
INSERT INTO "public"."variedades" VALUES ('092', 'C86-156');
INSERT INTO "public"."variedades" VALUES ('093', 'C86-251');
INSERT INTO "public"."variedades" VALUES ('094', 'C86-406');
INSERT INTO "public"."variedades" VALUES ('095', 'C88-381');
INSERT INTO "public"."variedades" VALUES ('096', 'C88-523');
INSERT INTO "public"."variedades" VALUES ('097', 'C89-147');
INSERT INTO "public"."variedades" VALUES ('098', 'C89-148');
INSERT INTO "public"."variedades" VALUES ('099', 'Otras');
INSERT INTO "public"."variedades" VALUES ('100', 'POJ2878(355)');
INSERT INTO "public"."variedades" VALUES ('101', 'POJ2878(365)');
INSERT INTO "public"."variedades" VALUES ('102', 'Ja60-5(179)');
INSERT INTO "public"."variedades" VALUES ('103', 'C87-51(100)');
INSERT INTO "public"."variedades" VALUES ('104', 'C87-51(105)');
INSERT INTO "public"."variedades" VALUES ('105', 'C87-51(179)');
INSERT INTO "public"."variedades" VALUES ('106', 'C236-51(28)');
INSERT INTO "public"."variedades" VALUES ('107', 'C236-51(53)');
INSERT INTO "public"."variedades" VALUES ('108', 'CP52-43(27)');
INSERT INTO "public"."variedades" VALUES ('109', 'POJ2878(112)');
INSERT INTO "public"."variedades" VALUES ('110', 'POJ2878(361)');
INSERT INTO "public"."variedades" VALUES ('111', 'C137-81(20)');
INSERT INTO "public"."variedades" VALUES ('112', 'C89-161');
INSERT INTO "public"."variedades" VALUES ('113', 'C89-176');
INSERT INTO "public"."variedades" VALUES ('114', 'C89-250');
INSERT INTO "public"."variedades" VALUES ('115', 'C90-647');
INSERT INTO "public"."variedades" VALUES ('116', 'Q68');
INSERT INTO "public"."variedades" VALUES ('117', 'B78505');
INSERT INTO "public"."variedades" VALUES ('118', 'C90-105');
INSERT INTO "public"."variedades" VALUES ('119', 'C87-252');
INSERT INTO "public"."variedades" VALUES ('120', 'C88-356');
INSERT INTO "public"."variedades" VALUES ('121', 'C86-403');
INSERT INTO "public"."variedades" VALUES ('122', 'C86-554');
INSERT INTO "public"."variedades" VALUES ('123', 'C86-226');
INSERT INTO "public"."variedades" VALUES ('124', 'RB745433');
INSERT INTO "public"."variedades" VALUES ('125', 'C88-556');
INSERT INTO "public"."variedades" VALUES ('126', 'C89-372');
INSERT INTO "public"."variedades" VALUES ('127', 'C91-115');
INSERT INTO "public"."variedades" VALUES ('128', 'C91-356');
INSERT INTO "public"."variedades" VALUES ('129', 'C92-203');
INSERT INTO "public"."variedades" VALUES ('130', 'C92-325');
INSERT INTO "public"."variedades" VALUES ('131', 'C91-367');
INSERT INTO "public"."variedades" VALUES ('132', 'C89-246');
INSERT INTO "public"."variedades" VALUES ('133', 'C92-514');
INSERT INTO "public"."variedades" VALUES ('134', 'C92-524');
INSERT INTO "public"."variedades" VALUES ('135', 'C91-522');
INSERT INTO "public"."variedades" VALUES ('136', 'C88-553');
INSERT INTO "public"."variedades" VALUES ('137', 'C87-635');
INSERT INTO "public"."variedades" VALUES ('138', 'C95-416');
INSERT INTO "public"."variedades" VALUES ('139', 'C97-445');

-- ----------------------------
-- View structure for view_pers_proy
-- ----------------------------
DROP VIEW IF EXISTS "public"."view_pers_proy";
CREATE VIEW "public"."view_pers_proy" AS  SELECT personal_proy.id,
    personal_proy.id_proy,
    provincias.idprovincias,
    provincias.nombre,
    personal_proy.id_personal,
    personal_proy.porc_part,
    personal_proy.estimulacion,
    personal_proy.pago_res,
    personal_proy.jefe
   FROM ((personal_proy
   JOIN personal ON ((personal_proy.id_personal = personal.id)))
   JOIN provincias ON (((personal.provincia)::text = (provincias.idprovincias)::text)))
  ORDER BY personal_proy.id_proy, provincias.idprovincias;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."categorias_codigo_seq"
OWNED BY "public"."categorias"."codigo";
SELECT setval('"public"."categorias_codigo_seq"', 11, true);
ALTER SEQUENCE "public"."etapa_presup_prov_id_seq"
OWNED BY "public"."etapa_presup_prov"."id";
SELECT setval('"public"."etapa_presup_prov_id_seq"', 2, false);
ALTER SEQUENCE "public"."etapas_id_seq"
OWNED BY "public"."etapas"."id";
SELECT setval('"public"."etapas_id_seq"', 287, true);
ALTER SEQUENCE "public"."experimentos_vigentes_id_seq"
OWNED BY "public"."experimentos_vigentes"."id";
SELECT setval('"public"."experimentos_vigentes_id_seq"', 5, true);
ALTER SEQUENCE "public"."gastos_id_seq"
OWNED BY "public"."gastos"."id";
SELECT setval('"public"."gastos_id_seq"', 13, true);
ALTER SEQUENCE "public"."materiales_plan_id_seq"
OWNED BY "public"."materiales_plan"."id";
SELECT setval('"public"."materiales_plan_id_seq"', 3, true);
ALTER SEQUENCE "public"."otros_gastos_plan_id_seq"
OWNED BY "public"."otros_gastos_plan"."id";
SELECT setval('"public"."otros_gastos_plan_id_seq"', 376, true);
ALTER SEQUENCE "public"."personal_id_seq"
OWNED BY "public"."personal"."id";
SELECT setval('"public"."personal_id_seq"', 689, true);
ALTER SEQUENCE "public"."personal_proy_id_seq"
OWNED BY "public"."personal_proy"."id";
SELECT setval('"public"."personal_proy_id_seq"', 161, true);
ALTER SEQUENCE "public"."phpgen_users_user_id_seq"
OWNED BY "public"."phpgen_users"."user_id";
SELECT setval('"public"."phpgen_users_user_id_seq"', 4, true);
ALTER SEQUENCE "public"."proyectos_id_seq"
OWNED BY "public"."proyectos"."id";
SELECT setval('"public"."proyectos_id_seq"', 48, true);
ALTER SEQUENCE "public"."prueba_json_id_seq"
OWNED BY "public"."prueba_json"."id";
SELECT setval('"public"."prueba_json_id_seq"', 2, false);
ALTER SEQUENCE "public"."reportes_id_seq"
OWNED BY "public"."reportes"."id";
SELECT setval('"public"."reportes_id_seq"', 11, true);
ALTER SEQUENCE "public"."resultado_etapa_id_seq"
OWNED BY "public"."resultado_etapa"."id";
SELECT setval('"public"."resultado_etapa_id_seq"', 2, false);
ALTER SEQUENCE "public"."resultados_id_seq"
OWNED BY "public"."resultados"."id";
SELECT setval('"public"."resultados_id_seq"', 195, true);
ALTER SEQUENCE "public"."tareas_part_id_seq"
OWNED BY "public"."tareas_part"."id";
SELECT setval('"public"."tareas_part_id_seq"', 12, true);
ALTER SEQUENCE "public"."tareas_part_id_user_seq"
OWNED BY "public"."tareas_part"."id_user";
SELECT setval('"public"."tareas_part_id_user_seq"', 2, false);
ALTER SEQUENCE "public"."tipos_id_seq"
OWNED BY "public"."tipos"."id";
SELECT setval('"public"."tipos_id_seq"', 8, true);

-- ----------------------------
-- Primary Key structure for table areas
-- ----------------------------
ALTER TABLE "public"."areas" ADD CONSTRAINT "areas_pkey" PRIMARY KEY ("codigo");

-- ----------------------------
-- Primary Key structure for table categorias
-- ----------------------------
ALTER TABLE "public"."categorias" ADD CONSTRAINT "categorias_pkey" PRIMARY KEY ("codigo");

-- ----------------------------
-- Primary Key structure for table cepa
-- ----------------------------
ALTER TABLE "public"."cepa" ADD CONSTRAINT "cepa_pkey" PRIMARY KEY ("codigo");

-- ----------------------------
-- Primary Key structure for table codmateriales
-- ----------------------------
ALTER TABLE "public"."codmateriales" ADD CONSTRAINT "codmateriales_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table conceptos
-- ----------------------------
ALTER TABLE "public"."conceptos" ADD CONSTRAINT "conceptos_pkey" PRIMARY KEY ("codigo");

-- ----------------------------
-- Primary Key structure for table etapa_presup_prov
-- ----------------------------
ALTER TABLE "public"."etapa_presup_prov" ADD CONSTRAINT "etapa_presup_prov_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table etapas
-- ----------------------------
ALTER TABLE "public"."etapas" ADD CONSTRAINT "etapas_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table experimentos_vigentes
-- ----------------------------
ALTER TABLE "public"."experimentos_vigentes" ADD CONSTRAINT "experimentos_vigentes_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table fuentes_fin
-- ----------------------------
ALTER TABLE "public"."fuentes_fin" ADD CONSTRAINT "fuentes_fin_pkey" PRIMARY KEY ("codigo");

-- ----------------------------
-- Primary Key structure for table gastos
-- ----------------------------
ALTER TABLE "public"."gastos" ADD CONSTRAINT "gastos_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table materiales_plan
-- ----------------------------
ALTER TABLE "public"."materiales_plan" ADD CONSTRAINT "materiales_plan_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table members
-- ----------------------------
CREATE INDEX "index_members_on_project_id" ON "public"."members" USING btree (
  "project_id" "pg_catalog"."int4_ops" ASC NULLS LAST
);
CREATE INDEX "index_members_on_user_id" ON "public"."members" USING btree (
  "user_id" "pg_catalog"."int4_ops" ASC NULLS LAST
);
CREATE INDEX "index_members_on_user_id_and_project_id" ON "public"."members" USING btree (
  "user_id" "pg_catalog"."int4_ops" ASC NULLS LAST,
  "project_id" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table members
-- ----------------------------
ALTER TABLE "public"."members" ADD CONSTRAINT "members_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table meses
-- ----------------------------
ALTER TABLE "public"."meses" ADD CONSTRAINT "meses_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table otros_gastos_plan
-- ----------------------------
ALTER TABLE "public"."otros_gastos_plan" ADD CONSTRAINT "otros_gastos_plan_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table otros_gastos_real
-- ----------------------------
ALTER TABLE "public"."otros_gastos_real" ADD CONSTRAINT "otros_gastos_plan_copy1_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table personal
-- ----------------------------
ALTER TABLE "public"."personal" ADD CONSTRAINT "personal_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table personal_proy
-- ----------------------------
CREATE INDEX "persona" ON "public"."personal_proy" USING btree (
  "id_personal" "pg_catalog"."int8_ops" ASC NULLS LAST
);
CREATE INDEX "proyecto" ON "public"."personal_proy" USING btree (
  "id_proy" "pg_catalog"."int8_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table personal_proy
-- ----------------------------
ALTER TABLE "public"."personal_proy" ADD CONSTRAINT "personal_proy_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table phpgen_users
-- ----------------------------
ALTER TABLE "public"."phpgen_users" ADD CONSTRAINT "phpgen_users_pkey" PRIMARY KEY ("user_id");

-- ----------------------------
-- Primary Key structure for table plan_gastos
-- ----------------------------
ALTER TABLE "public"."plan_gastos" ADD CONSTRAINT "plan_gastos_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table provincias
-- ----------------------------
ALTER TABLE "public"."provincias" ADD CONSTRAINT "provincias_pkey" PRIMARY KEY ("idprovincias");

-- ----------------------------
-- Primary Key structure for table proyectos
-- ----------------------------
ALTER TABLE "public"."proyectos" ADD CONSTRAINT "proyectos_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table prueba_json
-- ----------------------------
ALTER TABLE "public"."prueba_json" ADD CONSTRAINT "prueba_json_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table real_gastos
-- ----------------------------
ALTER TABLE "public"."real_gastos" ADD CONSTRAINT "real_gastos_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table reportes
-- ----------------------------
ALTER TABLE "public"."reportes" ADD CONSTRAINT "reportes_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table resultado_etapa
-- ----------------------------
ALTER TABLE "public"."resultado_etapa" ADD CONSTRAINT "resultado_etapa_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table resultados
-- ----------------------------
ALTER TABLE "public"."resultados" ADD CONSTRAINT "resultados_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table suelos
-- ----------------------------
ALTER TABLE "public"."suelos" ADD CONSTRAINT "suelos_pkey" PRIMARY KEY ("codigo");

-- ----------------------------
-- Primary Key structure for table tareas_part
-- ----------------------------
ALTER TABLE "public"."tareas_part" ADD CONSTRAINT "tareas_part_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table territorios
-- ----------------------------
ALTER TABLE "public"."territorios" ADD CONSTRAINT "territorios_pkey" PRIMARY KEY ("codigo");

-- ----------------------------
-- Primary Key structure for table tipos
-- ----------------------------
ALTER TABLE "public"."tipos" ADD CONSTRAINT "tipos_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table user_perms
-- ----------------------------
ALTER TABLE "public"."user_perms" ADD CONSTRAINT "user_perms_pkey" PRIMARY KEY ("user_id", "page_name", "perm_name");

-- ----------------------------
-- Primary Key structure for table variedades
-- ----------------------------
ALTER TABLE "public"."variedades" ADD CONSTRAINT "variedades_pkey" PRIMARY KEY ("codigo");

-- ----------------------------
-- Foreign Keys structure for table etapa_presup_prov
-- ----------------------------
ALTER TABLE "public"."etapa_presup_prov" ADD CONSTRAINT "etapaId" FOREIGN KEY ("id_etapa") REFERENCES "public"."resultado_etapa" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table personal_proy
-- ----------------------------
ALTER TABLE "public"."personal_proy" ADD CONSTRAINT "pers_proy" FOREIGN KEY ("id_personal") REFERENCES "public"."personal" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."personal_proy" ADD CONSTRAINT "proy_part" FOREIGN KEY ("id_proy") REFERENCES "public"."proyectos" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
