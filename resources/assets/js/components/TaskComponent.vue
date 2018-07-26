<template>
  <div class="row justify-content-center mt-5">
   <div class="col-md-8">
      <div class="card border-info">
      <div class="card-header bg-info text-white">
        Header <a href="" class="btn btn-success float-right" data-toggle="modal" data-target="#modelId">+</a>
      </div>
      <div class="card-body">
        <ul>
          <li v-for="(item,index) in tasks" :key="index">
           {{index +1}}- {{item.id}} -{{item.name}}
          </li>
        </ul>
      </div>
      <div class="card-footer border-info">
        <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item" ><a class="page-link" @click="fetchData(pagination.first_page_url)" href="#">First</a></li>

     <li class="page-item" :class="[{disabled: !pagination.prev_page_url}]"><a class="page-link" @click="fetchData(pagination.prev_page_url)" href="#">Previous</a></li>
   
    <li class="page-item"><a class="page-link" href="#">
    Page {{pagination.current_page}} of {{pagination.last_page}} 
    </a></li>
    
    <li class="page-item" :class="[{disabled: !pagination.next_page_url}]"><a class="page-link" @click="fetchData(pagination.next_page_url)" href="#">Next</a></li>

     <li class="page-item" ><a class="page-link" @click="fetchData(pagination.last_page_url)" href="#">Last</a></li>
  </ul>
</nav>
      </div>
    </div>
   </div>

   <add-modal @recordAdded="refreshData"></add-modal>
  </div>
</template>
<script>
const AddModal = require("./AddModal.vue");
export default {
  components: {
    "add-modal": AddModal
  },
  data() {
    return {
      tasks: {},
      data: "",
      pagination: {}
    };
  },
  created() {
    this.fetchData();
    // var url = "http://localhost/vlp-3/public/task/";
    // // var url = "http://127.0.0.1:8000/task"
    // let vm = this;
    // axios
    //   .get(url)
    //   .then(res => {
    //     this.tasks = res.data.data;
    //     // console.log(res.data.data);
    //     // var data = res.data;
    //     console.log(res.data);
    //     vm.makePagination(res.meta, res.links);
    //   })
    //   .catch(err => console.log(err));
  },
  methods: {
    fetchData(page_url) {
      var page_url = page_url || "http://localhost/vlp-3/public/task/";
      // var url = "http://127.0.0.1:8000/task"
      let vm = this;
      axios
        .get(page_url)
        .then(res => {
          this.tasks = res.data.data;
          // console.log(res.data.data);
          // var data = res.data;
          console.log(res.data.next);
          vm.makePagination(res.data);
        })
        .catch(err => console.log(err));
    },
    makePagination(data) {
      let pagination = {
        current_page: data.current_page,
        last_page: data.last_page,
        last_page_url: data.last_page_url,
        next_page_url: data.next_page_url,
        prev_page_url: data.prev_page_url,
        first_page_url: data.first_page_url
      };
      this.pagination = pagination;
    },
    refreshData(data) {
      this.tasks = data.data;
    }
  }
};
</script>

