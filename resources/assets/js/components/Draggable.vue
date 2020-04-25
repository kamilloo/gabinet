<template>
    <draggable
            v-model="myArray"
            group="people"
            @start="drag=true"
            @end="stopDrag"
    >
        <div class="row py-2" v-for="(element, index) in myArray" :key="element.id">
            <div class="col bg-light">{{ index + 1 }}</div>
            <div class="col bg-light">{{ element.title }}</div>
            <div class="col bg-light">{{ element.price }}</div>
            <div class="col bg-light">{{ element.description }}</div>
            <div class="col bg-light">{{ element.link }}</div>
        </div>
    </draggable>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        name: "Draggable",
        components: {
            draggable,
        },
        props : [ 'items', 'sortableEndpoint'],
        data() {
            return {
                myArray: this.items,
                drag: false
            }
        },
        methods: {
            stopDrag(){
                fetch(this.sortableEndpoint, {
                    method: 'post',
                    credentials: 'include',
                    headers: {
                        "Content-type": "application/json",
                        "Accept": "application/json",
                    },
                    body: JSON.stringify({payload: this.myArray})
                }).then((data) => {
                    console.log(data)
                }).catch((error) => {
                    console.log(error)
                })
            }
        }
    }
</script>

<style scoped>

</style>
