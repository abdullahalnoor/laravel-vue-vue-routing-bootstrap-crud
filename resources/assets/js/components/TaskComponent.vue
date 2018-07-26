<template>
  <div class="row justify-content-center mt-5">
    <div class="col-md-8">
      <div class="card border-info">
        <div class="card-header bg-info text-white">
          Header
          <a href="" class="btn btn-success float-right" data-toggle="modal" data-target="#modelId">+</a>
        </div>
        <div class="card-body full-width">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item,index) in tasks.data" :key="index">
                <td>{{index +1}}</td>
                <td> {{item.name}}</td>
                <td>
                  <a href="" class="btn btn-info" @click="editRecord(item.id)"  data-toggle="modal" data-target="#editModal">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>
                  <a href="" class="btn btn-danger ">
                    <i class="glyphicon glyphicon-trash"></i> Delete</a>
                </td>

              </tr>
            </tbody>
            <tfoot>
              <tr class="text-center">
                <td colspan="3">
                  
                   <div class="row justify-content-center">
                      <pagination :data="tasks" @pagination-change-page="getResults"></pagination>
                   </div>

                </td>
              </tr>
            </tfoot>
          </table>
        </div>

      </div>
    </div>

    <add-modal @recordAdded="refreshData" ></add-modal>
    <edit-modal :editRec="editRecordData" @recordUpdated="refreshData"></edit-modal>
  </div>
</template>
<script>
const AddModal = require("./AddModal.vue");
Vue.component("pagination", require("laravel-vue-pagination"));
const EditModal = require("./EditModal.vue");

export default {
  components: {
    "add-modal": AddModal,
    "edit-modal": EditModal
  },
  data() {
    return {
      tasks: {},
      data: "",
      editRecordData: {}
      // pagination: {}
    };
  },
  created() {
    // this.fetchData();
    var url = "http://localhost/vlp-3/public/task/";
    // var url = "http://127.0.0.1:8000/task"
    let vm = this;
    axios
      .get(url)
      .then(res => {
        this.tasks = res.data;
        // console.log(res.data.data);
        // var data = res.data;
        // console.log(res.data);
        // vm.makePagination(res.meta, res.links);
      })
      .catch(err => console.log(err));
  },
  methods: {
    getResults(page = 1) {
      axios
        .get("http://localhost/vlp-3/public/task?page=" + page)
        .then(response => {
          this.tasks = response.data;
          // console.log(response.data);
        });
    },
    refreshData(data) {
      this.tasks = data.data;
    },

    editRecord(id) {
      // console.log(id);
      axios
        .get("http://localhost/vlp-3/public/edit/" + id)
        .then(res => (this.editRecordData = res.data));
    }
  }
};
</script>
