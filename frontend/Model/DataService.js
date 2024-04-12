
class DataService {
 
    constructor() {
      axios.defaults.baseURL = "http://localhost:8000/";
    }
  
    getData(vegpont, callBack){
      axios.get(vegpont)
    .then(function (response) {
      callBack(response.data);
    })
    .catch(function (error) {
      console.log(error);
    })
    .finally(function () {
    });
    }
  
    postData(vegpont, data){
      axios.post(vegpont,data)
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });
    }
  
    updateData(vegpont,id,obj){
      axios.put(vegpont +'/'+ id,obj)
      .then(function(response){
        location.reload();
        console.log(response);
      })
      .catch((error)=>{
        console.log(error);
      })
    }
  
    deleteData(vegpont,id){
      axios.delete(vegpont+'/'+id)
      .then(function(response){
        location.reload();
        console.log(response);
      })
      .catch((error)=>{
        console.log(error);
      })
    }
  
  
  }
  export default DataService;