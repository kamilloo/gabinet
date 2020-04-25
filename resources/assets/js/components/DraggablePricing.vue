<template>
    <draggable
            v-model="myArray"
            group="people"
            @start="drag=true"
            @end="stopDrag"
    >
        <div class="row py-2" v-for="(element, index) in myArray" :key="element.id">
            <div class="col bg-light">{{ index + 1 }}</div>
            <div class="col bg-light">{{ element.name }}</div>
            <div class="col bg-light">{{ element.price_since }}</div>
        </div>
    </draggable>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        name: "DraggablePricing",
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
