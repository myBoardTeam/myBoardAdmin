package main.resources.myboard.utils;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

public class Criptography {

	private static MessageDigest md = null;

	static {
		try {
			md = MessageDigest.getInstance("MD5");
		} catch (NoSuchAlgorithmException ex) {
			ex.printStackTrace();
		}
	}

	private char[] hexCodes(byte[] text) {
		// private char[] hexCodes(byte[] text) {
		char[] hexOutput = new char[text.length * 2];

		String hexString;

		for (int i = 0; i < text.length; i++) {

			hexString = "00" + Integer.toHexString(text[i]);

			hexString.toUpperCase().getChars(hexString.length() - 2,
					hexString.length(), hexOutput, i * 2);
		}

		return hexOutput;
	}

	public String criptografar(String pw) {
		if (md != null) {
			return new String(hexCodes(md.digest(pw.getBytes())));
		}
		return null;
	}
}