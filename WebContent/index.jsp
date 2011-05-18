<%@ page
    language="java"
    contentType="text/html; charset=ISO-8859-1"
    pageEncoding="iso-8859-1"
    import="main.resources.myboard.web.render.*"
%>
<%!
	private String window_title = "Principal";

    private String[] css = {
        "styles/general.css",
        "styles/component.visual.sky.css",
        "styles/component.visual.floor.css",
        "styles/component.interactive.dashboard.css"
    };

	private String[] scr = { "scripts/jquery.gradient.js" };
    
    private LayoutMenu dashboard = new LayoutMenu();
    
    private LayoutPage layout = new LayoutPage( window_title, scr, css, dashboard.getLayout() );
    public String output = layout.getLayout();
%>
<%= output%>