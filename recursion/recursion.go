//递归画金字塔
package recursion

import "fmt"

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
