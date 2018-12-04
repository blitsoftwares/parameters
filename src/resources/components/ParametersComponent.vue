<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Ajustes dos parametros</div>

                    <div class="card-body">
                        <b-tabs>
                            <b-tab title="Financeiro" class="pt-3" active>
                                <div class="row">

                                </div>
                            </b-tab>
                            <b-tab title="NFe" >
                                <br>I'm the second tab content
                            </b-tab>
                            <b-tab title="disabled" disabled>
                                <br>Disabled tab!
                            </b-tab>
                        </b-tabs>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
