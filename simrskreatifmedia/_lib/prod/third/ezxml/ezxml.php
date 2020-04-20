<?php

if(get_cfg_var("safe_mode")==0)
{
        set_time_limit(0);
}

//
// $Id: ezxml.php,v 1.1.1.1 2011-05-12 20:31:33 diogo Exp $
//
// Definition of eZXML class
//
// Bård Farstad <bf@ez.no>
// Created on: <16-Nov-2001 11:26:01 bf>
//
// This source file is part of eZ publish, publishing software.
// Copyright (C) 1999-2000 eZ systems as
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, US
//

//!! eZXML
//! eZXML handles parsing of well formed XML documents.
/*!
  eZXML will create a DOM tree from well formed XML documents.

  \code

  \endcode

*/

class eZXML
{
    /*!
      Constructor, should not be used all functions are static.
    */
/* PHP7   function __construct( ) */
    function __construct( )
    {
        print( "Use the static functions: eZXML::domTree()" );
    }

    /*!
      \static
      Will return an DOM object tree from the well formed XML.

      $params["TrimWhiteSpace"] = false/true : if the XML parser should ignore whitespace between tags.
    */
    function domTree( $xmlDoc, $params=array() )
    {

        if (!isset($params['TrimWhiteSpace']))
        {
            $params['TrimWhiteSpace'] = FALSE;
        }

        $TagStack = array();

        // get document version
        // stip the !doctype (xdutoit modification)
        $xmlDoc = preg_replace( "%<\!DOCTYPE.*?>%is", "", $xmlDoc );

        // strip header
        $xmlDoc = preg_replace( "#<\?.*?\?>#", "", $xmlDoc );

        // strip comments
        $xmlDoc =& eZXML::stripComments( $xmlDoc );

        $domDocument = new eZDOMDocument();
        $domDocument->version = "1.0";

        $domDocument->root =& $domDocument->children;

        $currentNode =& $domDocument;

        $pos = 0;
        $endTagPos = 0;
        while ( $pos < strlen( $xmlDoc ) )
        {
            $char = $xmlDoc[$pos];
            if ( $char == "<" )
            {
                // find tag name
                $endTagPos = strpos( $xmlDoc, ">", $pos );

                // tag name with attributes
                $tagName = substr( $xmlDoc, $pos + 1, $endTagPos - ( $pos + 1 ) );

                // check if it's an endtag </tagname>
                if ( $tagName[0] == "/" )
                {
                    $lastNodeArray = array_pop( $TagStack );
                    $lastTag = $lastNodeArray["TagName"];

                    $lastNode =& $lastNodeArray["ParentNodeObject"];

                    unset( $currentNode );
                    $currentNode =& $lastNode;

                    $tagName = substr( $tagName, 1, strlen( $tagName ) );

                    // strip out namespace; nameSpace:Name
                    $colonPos = strpos( $tagName, ":" );

                    if ( $colonPos > 0 )
                        $tagName = substr( $tagName, $colonPos + 1, strlen( $tagName ) );


                    if ( $lastTag != $tagName )
                    {
                        print( "Error parsing XML, unmatched tags $tagName" );
                        return false;
                    }
                    else
                    {
                        //    print( "endtag name: $tagName ending: $lastTag <br> " );
                    }
                }
                else
                {
                    $firstSpaceEnd = strpos( $tagName, " " );
                    $firstNewlineEnd = strpos( $tagName, "\n" );

                    if ( $firstNewlineEnd != false )
                    {
                        if ( $firstSpaceEnd != false )
                        {
                            $tagNameEnd = min( $firstSpaceEnd, $firstNewlineEnd );
                        }
                        else
                        {

                            $tagNameEnd = $firstNewlineEnd;
                        }
                    }
                    else
                    {
                        if ( $firstSpaceEnd != false )
                        {
                            $tagNameEnd = $firstSpaceEnd;
                        }
                        else
                        {
                            $tagNameEnd = 0;
                        }
                    }

                    if ( $tagNameEnd > 0 )
                    {
                        $justName = substr( $tagName, 0, $tagNameEnd );
                    }
                    else
                        $justName = $tagName;


                    // strip out namespace; nameSpace:Name
                    $colonPos = strpos( $justName, ":" );

                    if ( $colonPos > 0 )
                        $justName = substr( $justName, $colonPos + 1, strlen( $justName ) );


                    // remove trailing / from the name if exists
                    if ( $justName[strlen($justName) - 1]  == "/" )
                    {
                        $justName = substr( $justName, 0, strlen( $justName ) - 1 );
                    }


                    // check for CDATA
                    $cdataSection = "";
                    $isCDATASection = false;
                    $cdataPos = strpos( $xmlDoc, "<![CDATA[", $pos );
                    if ( $cdataPos == $pos && $pos > 0)
                    {
                        $isCDATASection = true;
                        $endTagPos = strpos( $xmlDoc, "]]>", $cdataPos );
                        $cdataSection =& substr( $xmlDoc, $cdataPos + 9, $endTagPos - ( $cdataPos + 9 ) );

                        // new CDATA node
                        unset( $subNode );
                        $subNode = new eZDOMNode();
                        $subNode->name = " cdata-section";
                        $subNode->content = $cdataSection;
                        $subNode->type = 4;

                        $currentNode->children[] =& $subNode;

                        $pos = $endTagPos;
                        $endTagPos += 2;

                    }
                    else
                    {
                        // normal start tag
                        unset( $subNode );
                        $subNode = new eZDOMNode();
                        $subNode->name = $justName;
                        $subNode->type = 1;

                        $currentNode->children[] =& $subNode;
                    }

                    // find attributes
                    if ( $tagNameEnd > 0 )
                    {
                        $attributePart =& substr( $tagName, $tagNameEnd, strlen( $tagName ) );

//                        $attributeArray = preg_split ("/\" /", $attributePart );

//                        $attributeArray = explode( " ", $attributePart );

                        preg_match_all( "/([a-zA-Z:]+=\".*?\")/i",  $attributePart, $attributeArray );

                        foreach ( $attributeArray[0] as $attributePart )
                        {
                            $attributePart = $attributePart;

                            if ( trim( $attributePart ) != "" && trim( $attributePart ) != "/" )
                            {
                                $attributeTmpArray = explode( "=", $attributePart );

                                $attributeName = $attributeTmpArray[0];

                                // strip out namespace; nameSpace:Name
                                $colonPos = strpos( $attributeName, ":" );

                                if ( $colonPos > 0 )
                                    $attributeName = substr( $attributeName, $colonPos + 1, strlen( $attributeName ) );

                                $attributeValue = $attributeTmpArray[1];

                                // remove " from value part
                                $attributeValue = substr( $attributeValue, 1, strlen( $attributeValue ) - 2);

                                // start tag
                                unset( $attrNode );
                                $attrNode = new eZDOMNode();
                                $attrNode->name = $attributeName;
                                $attrNode->type = 2;
                                $attrNode->content = $attributeValue;

                                unset( $nodeValue );
                                $nodeValue = new eZDOMNode();
                                $nodeValue->name = "text";
                                $nodeValue->type = 3;
                                $nodeValue->content = $attributeValue;

                                $attrNode->children[] =& $nodeValue;

                                $subNode->attributes[] =& $attrNode;
                            }
                        }
                    }

                    // check it it's a oneliner: <tagname /> or a cdata section
                    if ( $isCDATASection == false )
                    if ( $tagName[strlen($tagName) - 1]  != "/" )
                    {
                        array_push( $TagStack,
                        array( "TagName" => $justName, "ParentNodeObject" => &$currentNode ) );

                        unset( $currentNode );
                        $currentNode =& $subNode;
                    }
                }
            }

            $pos = strpos( $xmlDoc, "<", $pos + 1 );


            if ( $pos == false )
            {
                // end of document
                $pos = strlen( $xmlDoc );
            }
            else
            {
                // content tag
                $tagContent = substr( $xmlDoc, $endTagPos + 1, $pos - ( $endTagPos + 1 ) );

                if ( ( $params["TrimWhiteSpace"] == true and ( trim( $tagContent ) != "" ) ) or $params["TrimWhiteSpace"] == false )
                {
                    unset( $subNode );
                    $subNode = new eZDOMNode();
                    $subNode->name = "text";
                    $subNode->type = 3;

                    // convert special chars
                    $tagContent =& str_replace("&amp;", "&", $tagContent );
                    $tagContent =& str_replace("&gt;", ">", $tagContent );
                    $tagContent =& str_replace("&lt;", "<", $tagContent );
                    $tagContent =& str_replace("&apos;", "'", $tagContent );
                    $tagContent =& str_replace("&quot;", '"', $tagContent );

                    $subNode->content = $tagContent;

                    $currentNode->children[] =& $subNode;
                }
            }
        }

        return $domDocument;
    }

    /*!
      \static
      \private
    */
    function stripComments( &$str )
    {
        $str = preg_replace( "#<\!--.*?-->#s", "", $str );
        return $str;
    }

}

if (!defined('NM_LIB_EZXML'))
{
    define('NM_LIB_EZXML', 'LOADED');
}

?>