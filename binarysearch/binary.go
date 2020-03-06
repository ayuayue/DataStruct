package binarysearch

import "fmt"

func Search() {
	arr := [...]int{1, 3, 5, 7, 9, 24, 56, 78, 89}
	target := 9
	//无论奇偶以 len/2 +1 为middle的index
	
	
	right := len(arr)
	left := 0
	middle := (right + left) / 2
	for {
		if target > arr[middle]  {
			left = middle
			middle = (middle + right) / 2
			if arr[middle] == target {
				fmt.Println("Find It\n")
				break
			}
		} else if target < arr[middle]  {
			right = middle
			middle = (middle) / 2
			if arr[middle] == target {
				fmt.Println("Find It\n")
				break
			}
		} else {
			fmt.Println("Find It\n")
			break
		}
	}

}
