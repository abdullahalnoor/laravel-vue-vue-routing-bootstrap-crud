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
           {{index +1}} -{{item.name}}
          </li>
        </ul>
      </div>
      <div class="card-footer border-info">
        Footer
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
      data: ""
    };
  },
  created() {
    var url = "http://localhost/vlp-3/public/task/";
    // var url = "http://127.0.0.1:8000/task"
    axios
      .get(url)
      .then(res => (this.tasks = res.data))
      .catch(err => console.log(err));
  },
  methods: {
    refreshData(data) {
      this.tasks = data.data;
    }
  }
};
</script>

