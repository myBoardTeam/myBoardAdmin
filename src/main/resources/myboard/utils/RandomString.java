package main.resources.myboard.utils;
public class RandomString {

	Criptography criptografar = new Criptography();

	@SuppressWarnings("deprecation")
	private String randomstring(int menor, int maior) {
		int n = rand(menor, maior);
		byte letra[] = new byte[n];
		byte numero[] = new byte[n];
		byte juntos[] = new byte[n];

		for (int i = 0; i < n; i++) {
			letra[i] = (byte) rand('a', 'z');
			numero[i] = (byte) rand('0', '9');
			juntos[i] = (byte) rand(numero[i], letra[i]);
		}
		// String numero1 = new String(numero, 0);
		// String letra1 = new String(letra, 0);
		String juntos1 = new String(juntos, 0);
		// return (new String (letra,0));
		return (juntos1);
	}

	private int rand(int menor, int maior) {
		java.util.Random rn = new java.util.Random();
		int n = maior - menor + 1;
		int i = rn.nextInt(n);
		if (i < 0)
			i = -i;
		return menor + i;
	}

	public String randomstring() {
		Integer maior = 6;
		Integer menor = 6;
		return randomstring(menor, maior);
		// return randomstring(5, 25);
	}
}