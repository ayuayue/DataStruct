package linesearch

import "fmt"

func Search() {
	arr := [...]int{21, 23, 4, 45, 6, 65, 67, 4352, 32, 34, 345, 5, 45, 52}
	target := 32
	for i := 0; i < len(arr); i++ {
		if arr[i] == target {
			fmt.Println("Find It\n")
			return
		}
		fmt.Println("Not Find It\n")
	}
}
