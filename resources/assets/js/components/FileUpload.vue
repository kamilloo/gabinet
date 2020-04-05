<template>
<div>
    <div class="form-group">
        <input type="hidden" :id="name" :name="name" class="form-control">
        <a id="lfm" :data-input="name" data-preview="holder" class="btn btn-primary">
            <i class="fa fa-picture-o"></i> {{ label }}
        </a>
        <small :id="nameHelp" class="form-text text-muted">{{ helper }}</small>
        <small :id="nameError" class="form-text text-danger">{{ uploadError }}</small>
        <div id="holder" class="col-sm-12">
            <img v-if="filepath" class="img-thumbnail" :src="holderSrc">
        </div>
    </div>

</div>
</template>

<script>
    export default {
        name: "FileUpload",
        props: {
            name: String,
            label: String,
            helper: String,
            uploadError: String,
            filepath: String
        },
        data () {
            return {
                nameHelp: this.name + 'Help',
                nameError: this.name + 'Error',
                holderSrc: '/storage/' + this.filepath
            }
        },
        mounted() {
            $('#lfm').filemanager('image');
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>

