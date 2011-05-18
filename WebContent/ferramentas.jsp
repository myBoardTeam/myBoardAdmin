<%@ page
    language="java"
    contentType="text/html; charset=ISO-8859-1"
    pageEncoding="iso-8859-1"
    import="main.resources.myboard.web.render.*"
%>
<%!
    private String window_title = "Cadastro de Ferramentas";

	private String[] css = {
        "styles/general.css",
        "styles/component.visual.sky.css",
        "styles/component.visual.floor.css",
        "styles/component.interactive.menu.css",
        "styles/component.interactive.window.css",
        "styles/component.interactive.form.input.css",
        "styles/component.interactive.form.textarea.css",
        "styles/component.interactive.form.checkbox.css",
        "styles/component.interactive.form.radiobutton.css",
        "styles/external/jquery.jscrollpane.css"
    };

	private String[] scr = {
	    "scripts/jquery.gradient.js",
	    "scripts/jquery.borderImage.js",
	    "scripts/jquery.mousewheel.js",
	    "scripts/jquery.jscrollpane.js",
	    "scripts/jquery.customInput.js"
	};
    
    private LayoutMenu menu = new LayoutMenu();
    private LayoutWindow window = new LayoutWindow( window_title, "" );

    private LayoutPage layout = new LayoutPage( window_title, scr, css, menu.getLayout() + window.getLayout() );
    public String output = layout.getLayout();
%>
<%= output%>