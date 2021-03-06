<?php

namespace marty\plugins;

use Smarty;
use Smarty_Internal_Template;

/**
 * Plugin for template blocks.
 *
 * @author Bert Peters <bert.ljpeters@gmail.com>
 */
class BlockPlugin extends BasePlugin
{
    public function register(Smarty $smarty)
    {
        $smarty->registerPlugin('block', $this->name, [$this, 'call']);
    }

    public function call(
        array $params,
        $content,
        Smarty_Internal_Template $template,
        bool &$repeat
    ) {
        $this->loadPlugin();

        $parameters = [
            'params' => $params,
            'template' => $template,
            'content' => $content,
            'repeat' => &$repeat,
        ];

        return $this->callWithParameters('smarty_block_' . $this->name, $parameters);
    }
}
