<div class="alert alert-info alert-dismissible fade show print-info-msg" role="alert" style="display:none">

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">

        <span aria-hidden="true">&times;</span>

    </button>

   <span class="info-msg"></span>

</div>

<div class="alert alert-warning alert-dismissible fade show print-warning-msg" role="alert" style="display:none">

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">

        <span aria-hidden="true">&times;</span>

    </button>

    <span class="warning-msg"></span>

</div>

<div class="print-success-msg">

</div>

<div class="print-singlerror-msg">

</div>

<div style="display:none" class="delete-record-msg">

	@php

		$recordMsg = array('title'=> __('message.detete_msg_title'),'text'=>__('message.detete_msg_text'),'cancel_btn_text'=>__('message.cancel_btn_text'),'confirm_btn_text'=>__('message.confirm_btn_text'),'deleted_title'=>__('message.deleted_title'));

		$recordMsg = json_encode($recordMsg);

	@endphp

	{{ $recordMsg }}

</div>
<div style="display:none" class="contract-close-record-msg">

    @php

        $recordMsg = array('title'=> __('message.close_msg_title'),'text'=>__('message.close_msg_text'),'cancel_btn_text'=>__('message.close_cancel_btn_text'),'confirm_btn_text'=>__('message.save_btn_text'));

        $recordMsg = json_encode($recordMsg);

    @endphp

    {{ $recordMsg }}

</div>
@if(Session::get('error'))

    <div class="alert alert-danger alert-dismissible show fade">

        <div class="alert-body">

            <button class="close" data-dismiss="alert">

                <span>×</span>

            </button>

            {{ Session::get('error') }}

        </div>

    </div>

@endif