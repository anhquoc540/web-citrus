<?php

namespace App\Helpers;

class Helper
{
    public static function menu($list, $parentId = 0, $child = '')
    {
        $html = '';

        foreach ($list as $key => $value) {
            // get menu parent
            if($value->parent_id == $parentId) {
                $html .= '
                    <tr>
                        <td>' . $value->id . '</td>
                        <td>' . $child . $value->name . '</td>
                        <td>' . $value->description . '</td>
                        <td>' . $value->content . '</td>
                        <td>' . self::active($value->active) . '</td>
                        <td>' . $value->updated_at . '</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/menu/edit/' .  $value->id . '"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger btn-sm" href="#" onclick="deleteMenu(' . $value->id . ')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                ';

                // delete menu parent in array
                unset($list[$key]);
                // call again function menu to get menu children have parent is parent delete above $value->id
                $html .= self::menu($list, $value->id, $child . '--');
            }
        }

        return $html;
    }

    public static function active($active) : string 
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>' : '<span class="btn btn-success btn-xs">YES</span>';
    }
}
