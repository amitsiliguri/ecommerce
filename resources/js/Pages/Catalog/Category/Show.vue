<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Category
            </h2>
        </template>
        <div>
					<div class="grid grid-cols-3 gap-4">
						<div class="md:col-span-1 col-span-3 p-3">
							<Form>
								<template #form>
									<div class="my-2">
			                <jet-label for="category_name" value="Name"/>
			                <jet-input id="category_name" type="text" class="mt-1 block w-full" ref="category_name" autocomplete="Name" />
											<!-- <jet-input-error :message="form.error('category_name')" class="mt-2" /> -->
			            </div>

									<div class="my-2">
			                <jet-label for="category_slug" value="Slug" class="mt-3"/>
			                <jet-input id="category_slug" type="text" class="mt-1 block w-full" ref="category_slug" autocomplete="Slug" />
											<!-- <jet-input-error :message="form.error('category_slug')" class="mt-2" /> -->
			            </div>
								</template>
								<template #actions>
									<jet-action-message  class="mr-3">
			                Saved.
			            </jet-action-message>

			            <jet-button>
			                Save
			            </jet-button>
								</template>
							</Form>
						</div>
						<div class="md:col-span-2 col-span-3 p-3">
							<NestedDraggable :tasks="list"/>
						</div>
					</div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../../Layouts/AppLayout'
		import Form from './../../../Component/Form'
		import JetActionMessage from './../../../Jetstream/ActionMessage'
    import JetButton from './../../../Jetstream/Button'
    import JetFormSection from './../../../Jetstream/FormSection'
    import JetInput from './../../../Jetstream/Input'
    import JetInputError from './../../../Jetstream/InputError'
    import JetLabel from './../../../Jetstream/Label'
		import NestedDraggable from "./Tree";
    export default {
        components: {
            AppLayout,
						Form,
						JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
						NestedDraggable,
        },
				data() {
    			return {
			      list: [
			        {
			          name: "task 1",
			          tasks: [
			            {
			              name: "task 2",
			              tasks: []
			            }
			          ]
			        },
			        {
			          name: "task 3",
			          tasks: [
			            {
			              name: "task 4",
			              tasks: []
			            }
			          ]
			        },
			        {
			          name: "task 5",
			          tasks: []
			        }
			      ]
			    };
  			}
    }
</script>
