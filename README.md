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

---

## listar.php

**Herramienta utilizada:** Gemini

**Justificación:** Se utilizó en las líneas 46-54 para implementar la lógica del `foreach` que itera sobre el arreglo de incidencias obtenidas de la base de datos. La IA proporcionó la estructura correcta para recorrer cada incidencia y renderizarla como una fila dentro de una tabla HTML, incluyendo medidas de seguridad como `htmlspecialchars()` y `urlencode()` para codificar correctamente el parámetro de ID en la URL de enlace al detalle. También se sugirió incluir la validación condicional `if (count($incidencias) > 0)` para mostrar un mensaje alternativo cuando no hay incidencias registradas.