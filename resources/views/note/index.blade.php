@extends('layout.bar')

@section('content')
<div class="d-flex ml-10x mb-15x justify-content-space-between">
    <h2>Notes</h2>
    <div class="d-flex">
        <input type="text" class="input-text-merged-button">
        <a class="btn-merged-input btn" href="">Search</a>
        <a class="btn-normal btn ml-10x" href="{{url('/note/add')}}">Add Note</a>
    </div>
</div>
<div class="note-page-content">
    <h3 class="ml-15x mt-15x mb-15x">My Note</h3>
    <div class="d-flex justify-content-space-between">
        <a href="{{url('/note/detail')}}">
            <div class="card p-10x note-list-item">
                <div class="d-flex justify-content-space-between item-align-center">
                    <div>
                        <h4>Note Title</h4>
                        <p class="font-12x">Kuraku</p>
                    </div>
                    <p class="font-12x text-align-right">10 Jan 2022</p>
                </div>
                <div class="divider mb-10x mt-10x"></div>
                <p class="note-description-thumbnail font-12x">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure eaque temporibus nam, quidem rem a aliquam odit explicabo molestiae repellat accusantium! Error magni iusto eveniet accusamus, ipsa impedit at delectus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus explicabo deleniti tenetur cumque ipsa soluta nulla eum exercitationem quasi doloribus provident tempore nostrum esse perferendis unde culpa repellendus, debitis corrupti.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure eaque temporibus nam, quidem rem a aliquam odit explicabo molestiae repellat accusantium! Error magni iusto eveniet accusamus, ipsa impedit at delectus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus explicabo deleniti tenetur cumque ipsa soluta nulla eum exercitationem quasi doloribus provident tempore nostrum esse perferendis unde culpa repellendus, debitis corrupti.
                </p>      
            </div>
        </a>
        <a href="{{url('/note/detail')}}">
            <div class="card p-10x ml-10x mr-10x note-list-item">
                <div class="d-flex justify-content-space-between item-align-center">
                    <h4>Note Title</h4>
                    <p class="font-12x text-align-right">10 Jan 2022</p>
                </div>
                <div class="divider mb-10x mt-10x"></div>
                <p class="note-description-thumbnail font-12x">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure eaque temporibus nam, quidem rem a aliquam odit explicabo molestiae repellat accusantium! Error magni iusto eveniet accusamus, ipsa impedit at delectus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus explicabo deleniti tenetur cumque ipsa soluta nulla eum exercitationem quasi doloribus provident tempore nostrum esse perferendis unde culpa repellendus, debitis corrupti.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure eaque temporibus nam, quidem rem a aliquam odit explicabo molestiae repellat accusantium! Error magni iusto eveniet accusamus, ipsa impedit at delectus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus explicabo deleniti tenetur cumque ipsa soluta nulla eum exercitationem quasi doloribus provident tempore nostrum esse perferendis unde culpa repellendus, debitis corrupti.
                </p>      
            </div>
        </a>
        <a href="{{url('/note/detail')}}">
            <div class="card p-10x note-list-item">
                <div class="d-flex justify-content-space-between item-align-center">
                    <h4>Note Title</h4>
                    <p class="font-12x text-align-right">10 Jan 2022</p>
                </div>
                <div class="divider mb-10x mt-10x"></div>
                <p class="note-description-thumbnail font-12x">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure eaque temporibus nam, quidem rem a aliquam odit explicabo molestiae repellat accusantium! Error magni iusto eveniet accusamus, ipsa impedit at delectus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus explicabo deleniti tenetur cumque ipsa soluta nulla eum exercitationem quasi doloribus provident tempore nostrum esse perferendis unde culpa repellendus, debitis corrupti.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure eaque temporibus nam, quidem rem a aliquam odit explicabo molestiae repellat accusantium! Error magni iusto eveniet accusamus, ipsa impedit at delectus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus explicabo deleniti tenetur cumque ipsa soluta nulla eum exercitationem quasi doloribus provident tempore nostrum esse perferendis unde culpa repellendus, debitis corrupti.
                </p>      
            </div>
        </a>
    </div>
    
    <h3 class="ml-15x mt-15x mb-15x">Public Note</h3>
    <div class="d-flex justify-content-space-between">
        <a href="{{url('/note/detail')}}">
            <div class="card p-10x note-list-item">
                <div class="d-flex justify-content-space-between item-align-center">
                    <h4>Note Title</h4>
                    <p class="font-12x text-align-right">10 Jan 2022</p>
                </div>
                <div class="divider mb-10x mt-10x"></div>
                <p class="note-description-thumbnail font-12x">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure eaque temporibus nam, quidem rem a aliquam odit explicabo molestiae repellat accusantium! Error magni iusto eveniet accusamus, ipsa impedit at delectus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus explicabo deleniti tenetur cumque ipsa soluta nulla eum exercitationem quasi doloribus provident tempore nostrum esse perferendis unde culpa repellendus, debitis corrupti.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure eaque temporibus nam, quidem rem a aliquam odit explicabo molestiae repellat accusantium! Error magni iusto eveniet accusamus, ipsa impedit at delectus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus explicabo deleniti tenetur cumque ipsa soluta nulla eum exercitationem quasi doloribus provident tempore nostrum esse perferendis unde culpa repellendus, debitis corrupti.
                </p>      
            </div>
        </a>
        <a href="{{url('/note/detail')}}">
            <div class="card p-10x ml-10x mr-10x note-list-item">
                <div class="d-flex justify-content-space-between item-align-center">
                    <h4>Note Title</h4>
                    <p class="font-12x text-align-right">10 Jan 2022</p>
                </div>
                <div class="divider mb-10x mt-10x"></div>
                <p class="note-description-thumbnail font-12x">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure eaque temporibus nam, quidem rem a aliquam odit explicabo molestiae repellat accusantium! Error magni iusto eveniet accusamus, ipsa impedit at delectus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus explicabo deleniti tenetur cumque ipsa soluta nulla eum exercitationem quasi doloribus provident tempore nostrum esse perferendis unde culpa repellendus, debitis corrupti.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure eaque temporibus nam, quidem rem a aliquam odit explicabo molestiae repellat accusantium! Error magni iusto eveniet accusamus, ipsa impedit at delectus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus explicabo deleniti tenetur cumque ipsa soluta nulla eum exercitationem quasi doloribus provident tempore nostrum esse perferendis unde culpa repellendus, debitis corrupti.
                </p>      
            </div>
        </a>
        <a href="{{url('/note/detail')}}">
            <div class="card p-10x note-list-item">
                <div class="d-flex justify-content-space-between item-align-center">
                    <h4>Note Title</h4>
                    <p class="font-12x text-align-right">10 Jan 2022</p>
                </div>
                <div class="divider mb-10x mt-10x"></div>
                <p class="note-description-thumbnail font-12x">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure eaque temporibus nam, quidem rem a aliquam odit explicabo molestiae repellat accusantium! Error magni iusto eveniet accusamus, ipsa impedit at delectus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus explicabo deleniti tenetur cumque ipsa soluta nulla eum exercitationem quasi doloribus provident tempore nostrum esse perferendis unde culpa repellendus, debitis corrupti.
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure eaque temporibus nam, quidem rem a aliquam odit explicabo molestiae repellat accusantium! Error magni iusto eveniet accusamus, ipsa impedit at delectus. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus explicabo deleniti tenetur cumque ipsa soluta nulla eum exercitationem quasi doloribus provident tempore nostrum esse perferendis unde culpa repellendus, debitis corrupti.
                </p>      
            </div>
        </a>
    </div>
</div>
@endsection

@section('note-active')
active
@endsection