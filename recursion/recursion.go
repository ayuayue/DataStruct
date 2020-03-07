//递归画金字塔
package recursion

import "fmt"

//递归画金字塔
func Draw(n int) {
	if n == 0 {
		return
	}
	Draw(n - 1)
	for i := 0; i < n; i++ {
		fmt.Printf("#")
	}
	fmt.Println()
}

//递归打印乘法表
func Multiplication(n int) {
	if n == 0 {
		return
	}
	Multiplication(n - 1)
	for i := 1; i <= n; i++ {
		fmt.Printf("%d * %d = %d\t",i,n,i*n)
	}
	fmt.Println()
}
