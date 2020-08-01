package offer_Go

func FindRepeatNumber(nums []int) int {
	// sort.Ints(nums)
	// for k, v := range nums {
	//     if k <= len(nums) {
	//         if v == nums[k+1] {
	//             return v
	//         }
	//     }
	//
	// }
	numSlice := make([]int, len(nums))
	if 2 <= len(nums) && len(nums) <= 100000 {
		for _, v := range nums {
			if numSlice[v] == 0 {
				numSlice[v] = v
			} else {
				return v
			}
		}
	}
	return -1
}
