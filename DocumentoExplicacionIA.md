# Documento de Explicación y Justificación de Inteligencia Artificial

**Institución:** Escuela Politécnica Nacional  
**Grupo:** 3

---

## acceso.php

**Herramienta utilizada:** ChatGPT

**Justificación:** Se utilizó en las líneas 21–25 para investigar e implementar la validación con la base de datos de forma segura. El agente ChatGPT proporcionó ejemplos de código sobre sentencias preparadas, ejecución de consultas y verificación de resultados, los cuales fueron adaptados al sistema desarrollado.

---

## registrar.php

**Herramienta utilizada:** ChatGPT

**Justificación:** Se utilizó para definir el flujo de validación, manejo de sesión y redirección según los códigos de estado (201/400/500), y para estructurar el formulario de registro de incidencias con inserción segura en base de datos.

## ConexiónDB.php
**Herramienta utilizada:** Claude
**Justificación:** Se utilizó para crear codigo que evitara el acceso al codigo de conexion de la base de datos por seguridad, creando una clase que centraliza la conexión a la base de datos y oculta los detalles de conexión.