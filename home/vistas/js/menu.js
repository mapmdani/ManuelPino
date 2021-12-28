/*=============================================
SideBar Menu
=============================================*/

//$('.sidebar-menu').tree()

//menu-open

/*$('#mySidebar nav ul li a').on('click', function(){
    $('li a.active').removeClass('active');
    $(this).addClass('active');
});*/


/// Url actual
let url = window.location.href;
//alert(url);
/// Elementos de li
const tabs = ["inicio","pagodirecto","pluspago"];

tabs.forEach(e => {
    /// Agregar .php y ver si lo contiene en la url
    if (url.indexOf(e) !== -1) {
		//alert(e)
        /// Agregar tab- para hacer que coincida la Id
        setActive("tab-" + e);

			if(e == "pagodirecto" ||e == "pluspago" ){
                
				setActive("tab-" + e);
				setActiveTree("tab-lipagos");
				setActive("tab-rootpagos");
			}
    }

});

/// Funcion que asigna la clase active
function setActive(id) {
    document.getElementById(id).setAttribute("class", "nav-link active");
}
function setActiveTree(id) {
    document.getElementById(id).setAttribute("class", "nav-item menu-is-opening menu-open");
}