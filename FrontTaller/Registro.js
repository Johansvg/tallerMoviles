import { View, Text, TextInput } from 'react-native'
import React from 'react'

export default function Registro() {
  return (
    <View>
        <TextInput placeholder='nombre'/>
        <TextInput placeholder='apellido'/>
        <TextInput placeholder='edad'/>
        <TextInput placeholder='acompañantes'/>
    </View>
  )
}