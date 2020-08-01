package main

import (
	og "DataStruct/offer-Go"
	"fmt"
)

func main() {
	// linesearch.Search()
	// binarysearch.Search()
	// recursion.Draw(5)
	// recursion.Multiplication(9)
	// sort.Bubble()
	fmt.Println("===")
	nums := []int{2, 3, 1, 0, 2, 5, 3}
	repeat := og.FindRepeatNumber(nums)
	fmt.Println(repeat)
}
