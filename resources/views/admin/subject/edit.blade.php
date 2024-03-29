@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.subject.actions.edit', ['name' => $subject->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <subject-form
                :action="'{{ $subject->resource_url }}'"
                :data="{{ $subject->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.subject.actions.edit', ['name' => $subject->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.subject.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </subject-form>

        </div>
    
</div>

@endsection