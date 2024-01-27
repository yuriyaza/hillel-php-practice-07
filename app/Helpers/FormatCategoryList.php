<?php

namespace App\Helpers;

class FormatCategoryList
{
    protected array $sourceDataset = [];
    protected string $mainCategoryPrefix = '';
    protected string $subCategoryPrefix = '';

    public function setSourceDataset($sourceDataset)
    {
        $this->sourceDataset = $sourceDataset;
        return $this;
    }

    public function setMainCategoryPrefix($mainCategoryPrefix)
    {
        $this->mainCategoryPrefix = $mainCategoryPrefix;
        return $this;
    }

    public function setSubCategoryPrefix($subCategoryPrefix)
    {
        $this->subCategoryPrefix = $subCategoryPrefix;
        return $this;
    }

    public function execute()
    {
        $totalList = [];


        foreach ($this->sourceDataset as $dataEntry) {
            $mainCategory = [];
            $subCategory = [];
            $mainAndSubCategory = [];
            $categoryIndex = null;

            foreach ($dataEntry as $key => $value) {

                // Формуємо категорію
                if (str_starts_with($key, $this->mainCategoryPrefix)) {
                    $keyWithoutMask = str_replace($this->mainCategoryPrefix . '_', '', $key);
                    $mainCategory[$keyWithoutMask] = $value;
                }

                // Формуємо підкатегорію
                if (str_starts_with($key, $this->subCategoryPrefix)) {
                    $keyWithoutMask = str_replace($this->subCategoryPrefix . '_', '', $key);
                    $subCategory[$keyWithoutMask] = $value;
                }
            }

            // Формуємо категорію + підкатегорію (при наявності), назва підкатегорії = $subCategoryPrefix
            if (count($subCategory) !== 0 && $this->subCategoryPrefix !== '') {
                $mainAndSubCategory = [...$mainCategory, $this->subCategoryPrefix => [$subCategory]];
            } else {
                $mainAndSubCategory = $mainCategory;
            }

            // Перевіряємо по ID, чи є вже така категорія в загальному списку та отримуємо її індекс
            foreach ($totalList as $key => $value) {
                if ($value['id'] === $mainCategory['id']) {
                    $categoryIndex = $key;
                }
            }

            // Якщо категорія відсутня - додаємо в загальний список категорію + підкатегорію
            if ($categoryIndex === null) {
                $totalList = [...$totalList, $mainAndSubCategory];

            // Якщо категорія вже є - до категорії в загальному списку додаємо нову підкатегорію
            } else {
                $totalList[$categoryIndex][$this->subCategoryPrefix] = [...$totalList[$categoryIndex][$this->subCategoryPrefix], $subCategory];
            };
        }

        return $totalList;
    }
}
