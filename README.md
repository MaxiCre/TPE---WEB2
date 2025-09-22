TPE-WEB2
Maximiliano Cremona - maxicrack9@gmail.com
Henry Melchior - henrymelchior028@gmail.com

PROYECTO DE NOTICIAS
Este proyecto es una base de datos para una página de noticias que permite organizar las noticias en diferentes categorías y filtrar por temas de interés. La relación entre noticias y categorías es de uno a muchos (1:N). Cada noticia pertenece a una única categoría, pero una categoría puede contener múltiples noticias.

Estructura: Categorías: cada categoría representa un tema o sección de noticias, por ejemplo, política, deportes, tecnología, espectáculos, etc. Noticias: cada noticia tiene un título, un párrafo de contenido y está asociada a una categoría específica.

Tablas: a) Categoría: id_categoria: INT (clave primaria), número único que identifica cada categoría. categoria: TEXT, nombre o descripción de la categoría. 
b) Noticia: id_noticia: INT (clave primaria), número único que identifica cada noticia. titulo: VARCHAR(200), título de la noticia. parrafo: TEXT, contenido principal de la noticia. id_categoria: INT (clave foránea), relacionado con el id_categoria de la tabla Categoría.
