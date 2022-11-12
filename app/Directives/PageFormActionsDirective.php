<?php
namespace InnovaCondomi\Directives;


class PageFormActionsDirective
{
    /**
     * Page form actions blade directive compiler.
     * @pageFormActions($type, $ruta, $template)
     *
     * @param string $type
     * @param string $ruta
     * @return string
     * @throws \Exception
     * @throws \Throwable
     */
    public function handle($type, $ruta)
    {
        return view('system.form-actions', compact('type', 'ruta'))->render();
    }
}