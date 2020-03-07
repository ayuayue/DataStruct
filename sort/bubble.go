package sort

import "fmt"

//冒泡排序
func Bubble() {
	arr := [...]int{43, 23, 45, 231, 34, 125, 267, 7, 788, 48, 754, 8, 6, 3, 63, 67}
	for j := 0; j < len(arr); j++ {
		for i := 0; i < len(arr)-1; i++ {
			if arr[i] > arr[i+1] {
				arr[i], arr[i+1] = arr[i+1], arr[i]
			}
		}
	}
	fmt.Println(arr)

}
