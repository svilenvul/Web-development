<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" >
    <xsl:template match="/" >
      <html>
          <body>
            <ul>              
              <xsl:for-each select="students/student">
                <li>
                  <ul>
                    <li>name: <xsl:value-of select="name"/></li>
                    <li>sex: <xsl:value-of select="sex"/></li> 
                    <li>date of birth: <xsl:value-of select="birthDate"/></li>
                    <li>phone: <xsl:value-of select="phone"/></li>                      
                    <li>email: <xsl:value-of select="email"/></li>
                    <li>course: <xsl:value-of select="course"/></li>
                    <li>speciality: <xsl:value-of select="speciality"/></li>
                    <ul>
                       <xsl:for-each select="/students/student/exam">
                        <li>exam : <xsl:value-of select="name"/> </li>
                        <li>tutor : <xsl:value-of select="tutor"/> </li>
                        <li>score : <xsl:value-of select="score"/> </li>
                       </xsl:for-each> 
                    </ul>
                  </ul>
                </li>
              </xsl:for-each>             
            </ul>          
          </body>      
      </html>   
    </xsl:template>
</xsl:stylesheet>
