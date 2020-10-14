export default {
  methods: {
      findClosest (array,num) {
        if(array == null || array.length == 0) {
          return
        }
        let closest = array[0];
        for(let item of array){
          if(Math.abs(item - num) < Math.abs(closest - num)){
            closest = item;
          }
        }
        return closest;
      },
  },
};
