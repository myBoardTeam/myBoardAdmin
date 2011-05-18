package main.resources.myboard.utils;

import java.text.SimpleDateFormat;
import java.util.Date;

public class DateFormat {
	public static Date ReturnDate(String p_string_date) throws Exception{
		SimpleDateFormat format = new SimpleDateFormat("dd/MM/yyyy");
		Date data = new Date(format.parse(p_string_date).getTime());
		return data;
	}
}  
