<extend name="Public/base"/>

<block name="body">
    <div class="main-title">
        <h2>{$meta_title}</h2>
    </div>
    <form action="{:U('save')}" method="post" class="form-horizontal">
        <div class="form-item">
            <label class="item-label">标题<span class="check-tips"></span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="title" value="{$info.title|default=''}">
            </div>
        </div>
        <div class="form-item">
            <input type="hidden" name="id" value="{$info.id|default=''}">
            <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal">确 定
            </button>
            <button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
        </div>
    </form>
</block>
<block name="script">
    <script type="text/javascript" charset="utf-8">
        //导航高亮
        highlight_subnav("{:U('index')}");
    </script>
</block>
