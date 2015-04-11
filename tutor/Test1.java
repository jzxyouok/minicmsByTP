/**
 * 输出一百以内的质数表
 * @author hh
 * 三种方式
 */
public class Test1 {

	public static void main(String[] args) {
		// 用for循环
		useFor();
		// while循环
		useWhile();
		// do while循环
		useDoWhile();
	}
	
	public static void useFor() {
		int i, j;
		int count = 0;
		System.out.println("用for循环：");
		for (i = 2; i < 100; i++) {
			for (j = 2; j <= i/2; j++) {
				if (i%j == 0) {
					break;
				}
			}
			if (j > i/2) {
				count++;
				System.out.print(i+" ");
				if (count % 5 == 0) {
					System.out.println();
				}
			}
		}
	}
	public static void useWhile() {
		int i = 2, j;
		int count = 0;
		System.out.println("用while循环：");
		while (i < 100) {
			j = 2;
			while (j <= i/2) {
				if (i%j == 0) {
					break;
				}
				j++;
			}
			if (j > i/2) {
				count++;
				System.out.print(i+" ");
				if (count % 5 == 0) {
					System.out.println();
				}
			}
			i++;
		}
	}
	
	public static void useDoWhile() {
		int i = 2, j;
		int count = 0;
		System.out.println("用do while循环：");
		do {
			j = 2;
			do {
				if (i%j == 0) {
					break;
				}
				j++;
			}while (j <= i/2);
			
			if (j > i/2) {
				count++;
				System.out.print(i+" ");
				if (count % 5 == 0) {
					System.out.println();
				}
			}
			i++;
		}while (i < 100);
	}
}
