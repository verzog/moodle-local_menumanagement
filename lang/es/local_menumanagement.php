<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Local Menu Management
 *
 * @package    local_menumanagement
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Gestión de menús';
$string['menumanagementtitle'] = 'Gestión de menús';
$string['menumanagementroot'] = 'Gestión de menús';

//$string['menulabel'] = 'Etiqueta de menú';
//$string['menulabel_desc'] = 'La etiqueta del menú se mostrará en la parte superior de todos los elementos del menú.';

$string['setting_collapseactivitiescoursenode_desc'] = 'Habilitar esta configuración permitirá a los usuarios contraer el nodo '.
    '"Actividades". <br /> <em> Esta configuración solo se procesa cuando la configuración "Insertar nodo \'Actividades \'" '.
    'también está activada. </em>';
$string['setting_collapseactivitiescoursenode'] = 'Contraer nodo "Actividades"';
$string['setting_collapseactivitiescoursenodedefault_desc'] = 'Habilitar esta configuración colapsará el nodo "Actividades" '.
    'de forma predeterminada. De lo contrario, se expandirá de forma predeterminada. Esta configuración solo controla el valor '.
    'predeterminado para cada usuario cuando el nodo se procesa para él por primera vez. <br /> <em> Esta configuración solo '.
    'se procesa cuando, colapsar nodo, está activado. </em>';
$string['setting_collapseactivitiescoursenodedefault'] = 'Contraer el nodo "Actividades" de forma predeterminada';
$string['setting_collapsebottomnodesheading'] = 'Contraer los nodos inferiores en el panel de navegación de Boost';
$string['setting_collapsecoursenodesheading'] = 'Contraer los nodos del curso en el panel de navegación de Boost';
$string['setting_collapsecoursesectionscoursenode_desc'] = 'Habilitar esta configuración permitirá a los usuarios contraer el '.
    'nodo "Secciones". <br /> <em> Esta configuración solo se procesa cuando la configuración "Insertar nodo \'Secciones\'" '.
    'también está activada. </em>';
$string['setting_collapsecoursesectionscoursenode'] = 'Contraer nodo "Secciones"';
$string['setting_collapsecoursesectionscoursenodedefault_desc'] = 'Habilitar esta configuración colapsará el nodo "Secciones" '.
    'de forma predeterminada. De lo contrario, se expandirá de forma predeterminada. Esta configuración solo controla el valor '.
    'predeterminado para cada usuario cuando el nodo se procesa para él por primera vez. <br /> <em> Esta configuración solo '.
    'se procesa cuando el colapso del nodo está activado. </em>';
$string['setting_collapsecoursesectionscoursenodedefault'] = 'Contraer nodo "Secciones" de forma predeterminada';
$string['setting_collapsecustombottomnodesadmins_desc'] = 'Habilitar esta configuración permitirá a los usuarios contraer los '.
    'nodos inferiores personalizados para administradores. <br /> <em> Esta configuración solo se procesa cuando la '.
    'configuración "Insertar nodos inferiores personalizados para administradores" tiene al menos un nodo personalizado con '.
    'al menos un nodo secundario agregado. </em>';
$string['setting_collapsecustombottomnodesadmins'] = 'Contraer nodos inferiores personalizados para administradores';
$string['setting_collapsecustombottomnodesadminsdefault_desc'] = 'Habilitar esta configuración colapsará los nodos inferiores '.
    'personalizados para los administradores de forma predeterminada. De lo contrario, se expandirán de forma predeterminada. '.
    'Esta configuración solo controla el valor predeterminado para cada usuario cuando los nodos se procesan para él por '.
    'primera vez. <br /> <em> Esta configuración solo se procesa cuando colapsar los nodos inferiores personalizados para '.
    'administradores está activado. </em>';
$string['setting_collapsecustombottomnodesadminsdefault'] = 'Contraer nodos inferiores personalizados para administradores de forma predeterminada';
$string['setting_collapsecustombottomnodesusers_desc'] = 'Habilitar esta configuración permitirá a los usuarios contraer los '.
    'nodos inferiores personalizados para los usuarios. <br /> <em> Esta configuración solo se procesa cuando la configuración '.
    '"Insertar nodos inferiores personalizados para los usuarios" tiene al menos un nodo personalizado con al menos un nodo '.
    'secundario agregado. </em>';
$string['setting_collapsecustombottomnodesusers'] = 'Contraer nodos inferiores personalizados para usuarios';
$string['setting_collapsecustombottomnodesusersdefault_desc'] = 'Habilitar esta configuración colapsará los nodos inferiores '.
    'personalizados para los usuarios de forma predeterminada. De lo contrario, se expandirán de forma predeterminada. Esta '.
    'configuración solo controla el valor predeterminado para cada usuario cuando los nodos se procesan para él por primera '.
    'vez. <br /> <em> Esta configuración solo se procesa cuando se activa colapsar los nodos inferiores personalizados para '.
    'los usuarios. </em> ';
$string['setting_collapsecustombottomnodesusersdefault'] = 'Contraer los nodos inferiores personalizados para los usuarios de forma predeterminada';
$string['setting_collapsecustomcoursenodesadmins_desc'] = 'Habilitar esta configuración permitirá a los usuarios contraer los '.
    'nodos de cursos personalizados para administradores. <br /> <em> Esta configuración solo se procesa cuando la '.
    'configuración "Insertar nodos de cursos personalizados para administradores" tiene al menos un nodo personalizado con al '.
    'menos un nodo secundario agregado. </em>';
$string['setting_collapsecustomcoursenodesadmins'] = 'Contraer nodos de cursos personalizados para administradores';
$string['setting_collapsecustomcoursenodesadminsdefault_desc'] = 'Habilitar esta configuración colapsará los nodos de cursos '.
    'personalizados para administradores de forma predeterminada. De lo contrario, se expandirán de forma predeterminada. '.
    'Esta configuración solo controla el valor predeterminado para cada usuario cuando los nodos se procesan para él por '.
    'primera vez. <br /> <em> Esta configuración solo se procesa cuando colapsar los nodos del curso personalizado para '.
    'administradores está activado. </em>';
$string['setting_collapsecustomcoursenodesadminsdefault'] = 'Contraer los nodos de cursos personalizados para administradores '.
    'de forma predeterminada';
$string['setting_collapsecustomcoursenodesusers_desc'] = 'Habilitar esta configuración permitirá a los usuarios contraer los '.
    'nodos de cursos personalizados para los usuarios. <br /> <em> Esta configuración solo se procesa cuando la configuración '.
    '"Insertar nodos de cursos personalizados para los usuarios" tiene al menos un nodo personalizado con al menos un nodo '.
    'secundario agregado. </em>';
$string['setting_collapsecustomcoursenodesusers'] = 'Contraer nodos de cursos personalizados para usuarios';
$string['setting_collapsecustomcoursenodesusersdefault_desc'] = 'Habilitar esta configuración colapsará los nodos de cursos '.
    'personalizados para los usuarios de forma predeterminada. De lo contrario, se expandirán de forma predeterminada. Esta '.
    'configuración solo controla el valor predeterminado para cada usuario cuando los nodos se procesan para él por primera '.
    'vez. <br /> <em> Esta configuración solo se procesa cuando se activa colapsar los nodos de curso personalizados para los usuarios. </em>';
$string['setting_collapsecustomcoursenodesusersdefault'] = 'Contraer los nodos de cursos personalizados para los usuarios de forma predeterminada';
$string['setting_collapsecustomnodesadmins_desc'] = 'Habilitar esta configuración permitirá a los usuarios contraer los nodos '.
    'raíz personalizados para administradores. <br /> <em> Esta configuración solo se procesa cuando la configuración '.
    '"Insertar nodos raíz personalizados para administradores" tiene al menos un nodo personalizado con al menos un nodo '.
    'secundario agregado. </em>';
$string['setting_collapsecustomnodesadmins'] = 'Contraer nodos raíz personalizados para administradores';
$string['setting_collapsecustomnodesadminsdefault_desc'] = 'Habilitar esta configuración colapsará los nodos raíz '.
    'personalizados para los administradores de forma predeterminada. De lo contrario, se expandirán de forma predeterminada. '.
    'Esta configuración solo controla el valor predeterminado para cada usuario cuando los nodos se procesan para él por '.
    'primera vez. <br /> <em> Esta configuración solo se procesa cuando colapsar los nodos raíz personalizados para '.
    'administradores está activado. </em>';
$string['setting_collapsecustomnodesadminsdefault'] = 'Contraer nodos raíz personalizados para administradores de forma predeterminada';
$string['setting_collapsecustomnodesusers_desc'] = 'Habilitar esta configuración permitirá a los usuarios contraer los nodos '.
    'raíz personalizados para los usuarios. <br /> <em> Esta configuración solo se procesa cuando la configuración "Insertar '.
    'nodos raíz personalizados para los usuarios" tiene al menos un nodo personalizado con al menos un nodo secundario '.
    'agregado. </em>';
$string['setting_collapsecustomnodesusers'] = 'Contraer nodos raíz personalizados para usuarios';
$string['setting_collapsecustomnodesusersdefault_desc'] = 'Habilitar esta configuración colapsará los nodos raíz personalizados'.
    ' para los usuarios de forma predeterminada. De lo contrario, se expandirán de forma predeterminada. Esta configuración '.
    'solo controla el valor predeterminado para cada usuario cuando los nodos se renderizan para él por primera vez. <br /> '.
    '<em> Esta configuración solo se procesa cuando se activa colapsar los nodos raíz personalizados para los usuarios. </em>';
$string['setting_collapsecustomnodesusersdefault'] = 'Contraer los nodos raíz personalizados para los usuarios de forma predeterminada';
$string['setting_collapsemycoursesnode_desc'] = 'Habilitar esta configuración permitirá a los usuarios contraer el nodo "Mis cursos".';
$string['setting_collapsemycoursesnode'] = 'Contraer nodo "Mis cursos"';
$string['setting_collapsemycoursesnodedefault_desc'] = 'Habilitar esta configuración colapsará el nodo "Mis cursos" de forma '.
    'predeterminada. De lo contrario, se expandirá de forma predeterminada. Esta configuración solo controla el valor '.
    'predeterminado para cada usuario cuando el nodo se procesa para él por primera vez. <br /> <em> Esta configuración solo '.
    'se procesa cuando el colapso del nodo está activado. </em>';
$string['setting_collapsemycoursesnodedefault'] = 'Contraer el nodo "Mis cursos" de forma predeterminada';
$string['setting_collapsemycoursesnodeperformancehint'] = 'Por favor tenga en cuenta: esta función solo funcionará si la '.
    'configuración <a href="/admin/search.php?query=navshowmycoursecategories"> navshowmycoursecategories</a> no está activa. '.
    'Si habilitas navshowmycoursecategories, esta configuración se ignorará y no hará nada.';
$string['setting_collapsenodesheading'] = 'Contraer los nodos raíz en el panel de navegación de Boost';
$string['setting_collapsenodestechnicalhint'] = 'Antecedentes técnicos: esto se hace agregando algo de código JavaScript y CSS '.
    'a la página que mostrará u ocultará los nodos de segundo nivel tan pronto como el usuario haga clic en el nodo. El estado '.
    'de colapsar nodo se almacenará en la sesión de cada usuario. Por lo tanto, los nodos solo estarán ocultos del panel de '.
    'navegación en tiempo de ejecución, pero permanecerán en el árbol de navegación y otras partes de Moodle aún pueden '.
    'acceder a ellos.';
$string['setting_customnodesusagechildnodes'] = '';
//$string['setting_customnodesusagechildnodes'] = 'Los nodos personalizados se pueden anidar con un nivel de jerarquía, es decir, un nodo personalizado puede tener nodos secundarios. Para crear un nodo secundario en lugar de un nodo principal, simplemente anteponga un guión al título del nodo personalizado.<br />
//Por ejemplo:<br />
//Administración|/admin/index.php<br />
//-Lista de usuarios de Moodle|/admin/user.php<br />
//-Administrar cursos|/course/management.php<br /><br />
//Tenga en cuenta:
//<ul>
//<li> Por razones técnicas, un nodo padre siempre necesita una URL válida, incluso si el nodo se hará plegable posteriormente.</li>
//<li> Además, si un nodo principal no se muestra porque se aplica una restricción (de idioma o cohorte), sus nodos secundarios tampoco se mostrarán.</li>
//</ul>';
$string['setting_customnodesusageadmins'] = "El valor anterior está en formato json. Visite este ".
	"<a href='/local/menumanagement' target='_blank'>enlace</a> para agregar, editar, eliminar y reordenar elementos del menú.";
//$string['setting_customnodesusageadmins'] = 'Cada línea consta de una fuente Awesome Icon (opcional), un título del enlace, una URL del enlace y los idiomas admitidos (opcional), separados por caracteres de barra. Cada nodo personalizado debe escribirse en una nueva línea.<br />
//Por ejemplo: <br />
//Sitio web de Moodle.org|http://www.moodle.org|en,de<br />
//Lista de usuarios de Moodle|/admin/user.php<br /><br />
//Más información sobre los parámetros:
//<ul>
//<li><b> Fuente Awesome Icon (opcional):</b> Este texto incluirá una definición de fuente Awesome Icon. Mencione el código de fuente Awesome Icon entre llaves. Ejemplo: {fa-home}</li>
//<li><b>Título:</b>Este texto se mostrará como el texto/etiqueta en el que se puede hacer clic del nodo personalizado.</li>
//<li><b>Enlace:</b> El destino del enlace se puede definir mediante una URL web completa (por ejemplo, https://moodle.org) o una ruta relativa dentro de su instancia de Moodle (por ejemplo, /login/logout.php).</li>
//<li><b>Idioma(s) admitidos (opcional):</b> Esta configuración se puede utilizar para mostrar el nodo personalizado a los usuarios del idioma especificado, únicamente. Separe más de un idioma admitido con comas. Si el nodo personalizado debe mostrarse en todos los idiomas, deje este campo vacío.</li>
//</ul>
//Tenga en cuenta:
//<ul>
//<li>Si el nodo personalizado no aparece en el panel de navegación de Boost, verifique si todos los parámetros obligatorios están configurados correctamente y si la configuración de idioma opcional se ajusta a su idioma de usuario actual de Moodle. </li>
//<li>Debido a la forma en que está construido el panel de navegación de Boost en el núcleo de Moodle, todos los nodos personalizados se muestran por igual. Es imposible agregar clases CSS personalizadas, ID de elementos HTML personalizados o un atributo de destino para abrir el enlace en una nueva ventana.</li>
//</ul>';
$string['setting_customnodesusageusers'] = "El valor anterior está en formato json. Visite este <a href='/local/menumanagement' target='_blank'>enlace</a> para agregar, editar, eliminar y reordenar elementos del menú.";
//$string['setting_customnodesusageusers'] = 'Cada línea consta de un Font Awesome Icon (opcional), un título de enlace, una URL de enlace, idioma(s) admitidos (opcional) y cohortes admitidas (opcional), separados por caracteres de barra vertical. Cada nodo personalizado debe escribirse en una nueva línea.<br />
//Por ejemplo:<br />
//Sitio web de Moodle.org|http://www.moodle.org|en,de<br />
//Nuestra universidad|http://www.our-university.edu<br />
//Facultad de matemáticas|http://www.our-university.edu/math||matemáticas<br /><br />
//Más información sobre los parámetros:
//<ul>
//<li><b>Icono de fuente impresionante (opcional):</b> Este texto incluirá una definición de Font Awesome Icon. Mencione el código de Font Awesome Icon entre llaves. Ejemplo: {fa-home}</li>
//<li><b>Título:</b> Este texto se mostrará como el texto/etiqueta en el que se puede hacer clic del nodo personalizado.</li>
//<li><b>Enlace:</b> El destino del enlace se puede definir mediante una URL web completa (por ejemplo, https://moodle.org) o una ruta relativa dentro de su instancia de Moodle (por ejemplo, /login/logout.php).</li>
//<li><b>Idioma(s) admitidos (opcional):</b> Esta configuración se puede utilizar para mostrar el nodo personalizado a los usuarios del idioma especificado únicamente. Separe más de un idioma admitido con comas. Si el nodo personalizado debe mostrarse en todos los idiomas, deje este campo vacío.</li>
//<li><b>Cohorte(s) admitidas (opcional):</b> Esta configuración se puede usar para mostrar el nodo personalizado a los miembros de la cohorte especificada únicamente. Utilice el ID de la cohorte, no el nombre de la cohorte, para esta configuración. Separe más de una cohorte admitida con comas. Si el nodo personalizado debe mostrarse a los usuarios independientemente de la membresía de cualquier cohorte, deje este campo vacío.
//</ul>
//Tenga en cuenta:
//<ul>
//<li>La división por barra vertical para los parámetros opcionales siempre es necesaria si se encuentran entre otras opciones. Esto significa que debe separar los parámetros con el carácter de barra vertical, aunque estén vacíos. Consulte también el ejemplo anterior del nodo personalizado de la Facultad de matemáticas.</li>
//<li>Si el nodo personalizado no aparece en el panel de navegación de Boost, verifique si todos los parámetros obligatorios están configurados correctamente, si la configuración de idioma opcional se ajusta a su idioma de usuario actual de Moodle y si es miembro de la configuración de cohorte opcional.</li>
//<li>Debido a la forma en que está construido el pnael de navegación de Boost en el núcleo de Moodle, todos los nodos personalizados se muestran por igual. Es imposible agregar clases CSS personalizadas, ID de elementos HTML personalizados o un atributo de destino para abrir el enlace en una nueva ventana.</li>
// </ul>';
$string['setting_insertactivitiescoursenode_desc'] = 'Al habilitar esta configuración, se insertará un nodo "Actividades" en '.
    'el panel de navegación de Boost, que contendrá los nodos que enlazan con las páginas de descripción general de la '.
    'actividad. Básicamente, trae la funcionalidad existente del bloque "Actividades" al panel de navegación de Boost.';
$string['setting_insertactivitiescoursenode'] = 'Insertar nodo "Actividades"';
$string['setting_insertbottomnodesheading'] = 'Inserte los nodos inferiores en el panel de navegación de Boost';
$string['setting_insertcoursenodesheading'] = 'Inserta los nodos del curso en el panel de navegación de Boost';
$string['setting_insertcoursesectionscoursenode_desc'] = 'Al habilitar esta configuración, se insertará un nodo "Secciones" en '.
    'el panel de navegación de Boost, que se colocará sobre la primera sección del curso actual.';
$string['setting_insertcoursesectionscoursenode'] = 'Insertar nodo "Secciones"';
$string['setting_insertcoursesectionscoursenodecorehint'] = 'Por favor tenga en cuenta: esta función solo funcionará si la '.
    'configuración <a href="/admin/search.php?query=linkcoursesections">linkcoursesections</a> está activa. Si desactivó las '.
    'secciones de linkcours, esta configuración será ignorada y no hará nada.';
$string['setting_insertcustombottomnodesadmins_desc'] = 'Con esta configuración, puede insertar nodos personalizados en el '.
    'panel de navegación de Boost, que se agregarán debajo de la sección principal en el panel de navegación, similar al '.
    'elemento "administración del sitio". Estos nodos personalizados solo se mostrarán a los administradores del sitio.';
$string['setting_insertcustombottomnodesadmins'] = 'Insertar nodos inferiores personalizados para administradores';
$string['setting_insertcustombottomnodesusers_desc'] = 'Con esta configuración, puede insertar nodos personalizados en el '.
    'panel de navegación de Boost, que se agregarán debajo de la sección principal en el panel de navegación, similar al '.
    'elemento "administración del sitio". Estos nodos personalizados se mostrarán a todos los usuarios.';
$string['setting_insertcustombottomnodesusers'] = 'Insertar nodos inferiores personalizados para usuarios';
$string['setting_insertcustomcoursenodesadmins_desc'] = 'Con esta configuración, puede insertar nodos personalizados en el '.
    'panel de navegación de Boost, que se agregarán después del último elemento de la sección del curso en el panel de '.
    'navegación, probablemente debajo del último elemento del tema del curso. Estos nodos personalizados solo se mostrarán '.
    'a los administradores del sitio.';
$string['setting_insertcustomcoursenodesadmins'] = 'Insertar nodos de curso personalizados para administradores';
$string['setting_insertcustomcoursenodesusers_desc'] = 'Con esta configuración, puede insertar nodos personalizados en el '.
    'panel de navegación de Boost, que se agregarán después del último elemento de la sección del curso en el panel de '.
    'navegación, probablemente debajo del último elemento del tema del curso. Estos nodos personalizados se mostrarán a '.
    'todos los usuarios.';
$string['setting_insertcustomcoursenodesusers'] = 'Insertar nodos de curso personalizados para usuarios';
$string['setting_insertcustomnodesadmins_desc'] = 'Con esta configuración, puede insertar nodos personalizados en el panel de '.
    'navegación de Boost, que se agregarán después del último elemento de la sección principal en el panel de navegación, '.
    'probablemente debajo del elemento "Mis cursos". Estos nodos personalizados solo se mostrarán a los administradores '.
    'del sitio.';
$string['setting_insertcustomnodesadmins'] = 'Insertar nodos raíz personalizados para administradores';
$string['setting_insertcustomnodesusers_desc'] = 'Con esta configuración, puede insertar nodos personalizados en el panel de '.
    'navegación de Boost, que se agregarán después del último elemento de la sección principal en el panel de navegación, '.
    'probablemente debajo del elemento "Mis cursos". Estos nodos personalizados se mostrarán a todos los usuarios.';
$string['setting_insertcustomnodesusers'] = 'Insertar nodos raíz personalizados para usuarios';
$string['setting_insertnodescollapsehint'] = 'Por favor tenga en cuenta que el nodo insertado tiene un enlace que conduce a la '.
    'página de inicio del curso porque Boost no admite agregar nodos sin un enlace de acción. El enlace de acción se anulará '.
    'tan pronto como habilite la configuración para contraer el nodo al mismo tiempo.';
$string['setting_insertnodesheading'] = 'Inserte los nodos raíz en el panel de navegación de Boost';
$string['setting_insertresourcescoursenode_desc'] = 'Al habilitar esta configuración, se insertará un nodo "Recursos" en el '.
    'panel de navegación de Boost que se vinculará a la página de descripción general de los recursos.<br /><em> Esta '.
    'configuración está asociada a la configuración "Insertar nodo \'Actividades\'". Si habilita ambas configuraciones, '.
    'obtendrá un nodo "Actividades" y un nodo "Recursos" según lo solicitado. Si solo habilita la configuración "Actividades", '.
    'el nodo "Actividades" también contendrá un nodo que se vincula a la página de descripción general de recursos.</em>';
$string['setting_insertresourcescoursenode'] = 'Insertar nodo "Recursos"';
$string['setting_removebadgescoursenode_desc'] = 'Habilitar esta configuración eliminará el nodo "Insignias" del panel de '.
    'navegación de Boost si no hay insignias en el curso. Los profesores siempre pueden acceder a la página de administración '.
    'de insignias en el menú del curso (menú de engranajes).<br /><em> Esta configuración solo se procesa cuando el subsistema de insignias está habilitado en Moodle.</em>';
$string['setting_removebadgescoursenode'] = 'Eliminar el nodo "Insignias"';
$string['setting_removecalendarnode_desc'] = 'Habilitar esta configuración eliminará el nodo "Calendario" del panel de '.
    'navegación de Boost.';
$string['setting_removecalendarnode'] = 'Eliminar el nodo "Calendario"';
$string['setting_removecompetenciescoursenode_desc'] = 'Habilitar esta configuración eliminará el nodo "Competencias" del '.
    'panel de navegación de Boost si no hay competencias en el curso. Para los profesores, habrá otro nodo "Competencias" '.
    'agregado al menú del curso (menú cog).<br /><em> Esta configuración solo se procesa cuando el subsistema de competencias '.
    'está habilitado en Moodle.</em>';
$string['setting_removecompetenciescoursenode'] = 'Eliminar el nodo "Competencias"';
$string['setting_removecoursenodesheading'] = 'Eliminar los nodos del curso del panel de navegación de Boost';
$string['setting_removecoursenodestechnicalhint'] = 'Antecedentes técnicos: esto se hace eliminando el nodo del árbol de '.
    'navegación. Por lo tanto, otras partes de Moodle ya no pueden acceder al nodo. En configuraciones normales de Moodle, es '.
    'de esperar que esto no cause ningún problema.';
$string['setting_removedashboardnode_desc'] = 'Habilitar esta configuración eliminará el nodo "Panel de control" del panel de '.
    'navegación de Boost.';
$string['setting_removedashboardnode'] = 'Eliminar el nodo "Panel de control (Dashboard)"';
$string['setting_removefirsthomenode_desc'] = 'Habilitar esta configuración eliminará el nodo "Inicio" o "Panel de control", '.
    'según lo que el usuario haya elegido como página de inicio, del panel de navegación de Boost.';
$string['setting_removefirsthomenode'] = 'Eliminar el primer nodo "Inicio" o "Panel de control (Dashboard)"';
$string['setting_removehomenode_desc'] = 'Habilitar esta configuración eliminará el nodo "Inicio" del panel de navegación '.
    'de Boost.';
$string['setting_removehomenode'] = 'Eliminar el nodo "Inicio"';
$string['setting_removemycoursesnode_desc'] = 'Habilitar esta configuración eliminará el nodo "Mis cursos" del panel de '.
    'navegación de Boost.';
$string['setting_removemycoursesnode'] = 'Eliminar el nodo "Mis cursos"';
$string['setting_removemycoursesnodeperformancehint'] = 'Tenga en cuenta: si habilita esta configuración y también ha '.
    'habilitado la configuración <a href="/admin/search.php?query=navshowmycoursecategories">navshowmycoursecategories</a>, '.
    'eliminar el nodo "Mis cursos" lleva más tiempo y debería considere la posibilidad de deshabilitar la '.
    'configuración navshowmycoursecategories.';
$string['setting_removenodesheading'] = 'Eliminar los nodos raíz del panel de navegación de Boost';
$string['setting_removenodestechnicalhint'] = 'Antecedentes técnicos: esto se hace estableciendo el atributo '.
    'showinflatnavigation del nodo en falso. Por lo tanto, el nodo solo estará oculto en el panel de navegación, pero '.
    'permanecerá en el árbol de navegación y aún se podrá acceder a él desde otras partes de Moodle.';
$string['setting_removeprivatefilesnode_desc'] = 'Habilitar esta configuración eliminará el nodo "Archivos privados" del panel '.
    'de navegación de Boost.';
$string['setting_removeprivatefilesnode'] = 'Eliminar el nodo "Archivos privados"';
$string['setting_removesecondhomenode_desc'] = 'Habilitar esta configuración eliminará el nodo "Inicio" o "Panel de control", '.
    'dependiendo de lo que el usuario haya elegido para no ser su página de inicio, del panel de navegación de Boost.';
$string['setting_removesecondhomenode'] = 'Eliminar el segundo nodo "Inicio" o "Panel de control (Dashboard)"';

$string['add_menu_item'] = 'Agregar elemento de menú';
$string['add_multilingual_label'] = 'Agregar etiqueta multilingüe';
$string['english_label'] = 'Etiqueta Inglés';
$string['label'] = ' Etiqueta multilingüe';
$string['language'] = 'Idioma';
$string['multilingual_label'] = 'Etiqueta multilingüe';
$string['select'] = 'Seleccione el idioma';
