<template>
  

 

<!-- Modal -->
<div  class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="modal-title" id="modelTitleId">Add  Task</h4>
            </div>
            <div class="modal-body">
              <p class="text-success font-weight-bold text-center" v-if="success.length > 0 ">{{success}}</p>
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" class="form-control" v-model="record">
                  <span v-if="errors.name" class="text-danger font-weight-bold"> {{errors.name[0]}} </span>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" v-on:click="addRecord">Save</button>
            </div>
        </div>
    </div>
</div>


</template>

<script>
export default {
  data() {
    return {
      record: "",
      error: "",
      success: "",
      errors: {}
    };
  },
  methods: {
    addRecord() {
      axios
        .post("http://localhost/vlp-3/public/store", {
          name: this.record
        })
        .then(res => {
          this.record = "";
          // this.$parent.tasks = res.data;
          this.$emit("recordAdded", res);
          this.success = "Task Added Successfully...";
          document.getElementById("modelId").modal("{ show: false }");
        })
        .catch(err => {
          console.log(err.response.data.errors);
          this.errors = err.response.data.errors;
        });
    }
  }
};
</script>
