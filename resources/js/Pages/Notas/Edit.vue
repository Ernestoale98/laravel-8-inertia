<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo de Notas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="p3-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Editar una nota</h3>
                            <p class="text-sm text-gray-600">Si editas no podras volver al estado anterior</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:roundend-md p-4">
                            <form @submit.prevent="submit">
                                <label class="block font-medium text-sm text-gray-700">Resumen</label>
                                <textarea class="form-input w-full rounded-md shadow-sm"
                                          v-model="form.excerpt">
                                </textarea>
                                <label class="block font-medium text-sm text-gray-700">Contenido</label>
                                <textarea class="form-input w-full rounded-md shadow-sm"
                                          rows="8"
                                          v-model="form.content">
                                </textarea>
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                                    Guardar
                                </button>
                                <hr class="my-6">
                                <button @click.prevent="destroy"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Label from "@/Jetstream/Label";
import Button from "@/Jetstream/Button";

export default {
    components: {
        Button,
        Label,
        AppLayout
    },
    props: {
        nota: {
            Object,
            required: true
        }
    },
    data() {
        return {
            form: {
                excerpt: this.nota.excerpt,
                content: this.nota.content
            }
        }
    },
    methods: {
        submit() {
            //Ziggy Route
            //this.route('notas.upload',this.nota.id)
            //Inertia utiliza axios
            this.$inertia.put(this.route('notas.update', this.nota.id), this.form)
        },
        destroy() {
            if (confirm('Estas seguro?'))
                this.$inertia.delete(this.route('notas.destroy', this.nota.id));
        }
    }
}
</script>
