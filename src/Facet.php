<?php
namespace WorldCat\Discovery;

use \EasyRdf_Resource;
use \EasyRdf_Format;

/**
 * A class that represents a Facet Resource in WorldCat
 *
 */
class Facet extends EasyRdf_Resource
{
   /**
    * Get facetIndex
    * return string
    */

    function getfacetIndex(){
        return $this->get('searcho:facetIndex');
    }
    
    /**
     * Get an array of FacetItems (WorldCat/Discovery/FacetItem)
     *
     * @return array
     */
    function getFacetValues(){
        $facetValueList = $this->graph->allResources('searcho:facetValue');
        $sortedFacetValueList  = array();
        foreach ($facetValueList as $facetValue){
            $sortedFacetValueList[(int)$facetValue->getCount()] = $facetValue;
        }
        krsort($sortedFacetValueList);
        return $sortedFacetValueList;
        
        return $facetValueList;
    }
}