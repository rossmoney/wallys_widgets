<template>
    <div class="row">
        <div class="col">
            <div class="input-group mb-3">
                <span class="input-group-text" id="order_size">Order Size</span>
                <input type="number" v-model="order_size" class="form-control" placeholder="251" aria-label="Order Size" aria-describedby="order_size">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="result">Packages Required</span>
                <textarea v-if="result == ''" disabled readonly class="form-control">0</textarea>
                <textarea v-for="(value, name) in result" disabled readonly class="form-control">{{ name }} x {{ value + '\n' }}</textarea>
            </div>

            <button v-on:click="calculate()" type="button" class="btn btn-primary float-right">Calculate Packages</button>
        </div>
    </div>
</template>

<script>
    import Package from '../classes/Package';

    export default {
        mounted() {
            this.result = 0;
            this.order_size = 0;
        },
        data() {
            return {
                result: 0,
                order_size: 0
            };
        },
        methods: {
            calculate() {
                if (this.order_size > 0)
                {
                    let self = this;
                    axios.get('/packages/result/' + this.order_size)
                        .then(function (response) {
                            Object.assign(self, response.data);
                        });
                } else {
                    alert('Please enter an order size.');
                }
            }
        },
    }
</script>
